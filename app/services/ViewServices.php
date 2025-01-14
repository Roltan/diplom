<?php

namespace App\Services;

use App\Http\Controllers\SolvedTestController;
use App\Http\Controllers\TestController;
use App\Http\Requests\Test\GenerateTestRequest;
use App\Http\Resources\Card\SolvedResource;
use App\Http\Resources\Card\StatisticResource;
use App\Models\SolvedTest;
use App\Models\Test;
use App\Models\Topic;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Database\Eloquent\Builder;

class ViewServices
{
    public function __construct(
        public SolvedTestController $solvedTestController,
        public TestController $testController
    ) {}

    private function convertObjectsToArray($data): mixed
    {
        // Если данные - массив, рекурсивно обрабатываем каждый элемент
        if (is_array($data)) {
            return array_map(fn($item) => $this->convertObjectsToArray($item), $data);
        }

        // Если данные - объект, преобразуем его в массив и рекурсивно обрабатываем
        if (is_object($data)) {
            return $this->convertObjectsToArray(
                json_decode(
                    json_encode($data),
                    true
                )
            );
        }

        // Если данные не являются массивом или объектом, возвращаем их как есть
        return $data;
    }

    private function filterByDate($solvedTest, ?int $day, ?string $month, ?int $year): Collection
    {
        return $solvedTest->filter(function ($solved) use ($day, $month, $year) {
            $match = true;

            // Фильтрация по дню
            if ($day !== null) {
                $match = $match && $solved->created_at->day == $day;
            }

            // Фильтрация по месяцу
            if ($month !== null) {
                $match = $match && $solved->created_at->month == $month;
            }

            // Фильтрация по году
            if ($year !== null) {
                $match = $match && $solved->created_at->year == $year;
            }

            return $match;
        });
    }

    private function applyDateFilter($query, ?int $day, ?int $month, ?int $year): Builder
    {
        if ($day !== null || $month !== null || $year !== null) {
            $query->where(function ($query) use ($day, $month, $year) {
                if ($day !== null) {
                    $query->whereDay('created_at', $day);
                }

                if ($month !== null) {
                    $query->whereMonth('created_at', $month);
                }

                if ($year !== null) {
                    $query->whereYear('created_at', $year);
                }
            });
        }

        return $query;
    }

    public function viewIndex(): View
    {
        $topic = Topic::query()
            ->orderBy('topic')
            ->get()
            ->pluck('topic');
        return view('index', ['topics' => $topic]);
    }

    public function viewCreate(): View
    {
        $topic = Topic::query()
            ->orderBy('topic')
            ->get()
            ->pluck('topic');
        return view('profile-create', ['topics' => $topic]);
    }

    public function viewProfile(): RedirectResponse|View
    {
        $user = Auth::user();
        if ($user === null)
            return redirect('/')->with('error', 'У вас нет прав посещать ту страницу');
        return view('profile', [
            'name' => $user->name,
            'email' => $user->email
        ]);
    }

    public function viewSolved(Request $request): RedirectResponse|View
    {
        $user = Auth::user();
        if ($user === null)
            return redirect('/')->with('error', 'У вас нет прав посещать ту страницу');

        $solvedTest = SolvedTest::query()
            ->where('user_id', $user->id);
        $tests = $solvedTest->get();

        // Фильтрация по названию теста
        if ($request->has('test_title')) {
            $testTitle = $request->input('test_title');
            $solvedTest->whereHas('test', function ($query) use ($testTitle) {
                $query->where('title', 'like', '%' . $testTitle . '%');
            });
        }

        // Фильтрация по дате
        $solvedTest = $this->applyDateFilter(
            $solvedTest,
            $request->input('day'),
            $request->input('month'),
            $request->input('year')
        );

        $solvedTest = $solvedTest->get();

        $tests = $tests->map(function ($solved) {
            return $solved->test->title;
        });
        return view('profile-solved', $this->convertObjectsToArray([
            'tests' => $tests,
            'cards' => SolvedResource::collection($solvedTest)
        ]));
    }

    public function viewStatistic(Request $request): RedirectResponse|View
    {
        $user = Auth::user();
        if ($user === null)
            return redirect('/')->with('error', 'У вас нет прав посещать ту страницу');

        $solvedTest = Test::query()
            ->where('user_id', $user->id);
        $tests = $solvedTest->get();

        // Фильтрация по названию теста, если параметр передан
        if ($request->has('test')) {
            $testTitle = $request->input('test');
            $solvedTest->where('title', $testTitle);
        }

        $solvedTest = $solvedTest->get();



        $solvedTest = $solvedTest->filter(function ($solvedTest) {
            return $solvedTest->solved()->count() !== 0;
        })->flatMap(function ($solvedTest) {
            return $solvedTest->solved()->orderByDesc('id')->get();
        });

        // Фильтрация по дате
        $solvedTest = $this->filterByDate(
            $solvedTest,
            $request->input('day'),
            $request->input('month'),
            $request->input('year')
        );

        return view('profile-statistic', $this->convertObjectsToArray([
            'tests' => $tests->pluck('title'),
            'cards' => StatisticResource::collection($solvedTest)
        ]));
    }

    public function viewTest(string $alias): RedirectResponse|View
    {
        $test = Http::get(env('APP_URL') . "/api/test/solve/" . $alias);
        if (!$test->successful()) {
            return redirect('/')->with('error', $test->json('error'));
        }
        $test = $test->json();

        return view('test', $this->convertObjectsToArray($test));
    }

    public function viewSolvedTest(int $solvedId): RedirectResponse|View
    {
        $response = $this->solvedTestController->getSolvedTest($solvedId);
        if ($response->status() != 200) {
            return redirect('/')->with('error', $response->original['error']);
        }
        $response = $response->original;

        return view('solved', $this->convertObjectsToArray($response));
    }

    public function viewMySolvedTest(int $testId): RedirectResponse|View
    {
        $response = $this->solvedTestController->getMySolvedTest($testId);
        if ($response->status() != 200) {
            return redirect('/')->with('error', $response->original['error']);
        }
        $response = $response->original;

        return view('solved', $this->convertObjectsToArray($response));
    }

    public function generateTest(GenerateTestRequest $request): RedirectResponse|View
    {
        $response = $this->testController->generateTest($request);
        if ($response->status() != 200) {
            return redirect('/')->with('error', $response->original['error']);
        }
        $response = $response->original;

        return view('edit', $this->convertObjectsToArray($response));
    }
}
