{{-- Page to view the blipd board --}}

{{-- Extending the layout --}}
@extends('blipd::layouts.master')

{{-- Placeholder for the page-specific content --}}
@section('content')
  <div class="row">
        <table class="table table-bordered text-center pt-2 mt-2">
            <thead>
            <tr>
                <th scope="col"></th>
                @foreach($states as $state)
                    <th>{{ $state->name }}</th>
                @endforeach
                {{--<th scope="col">Backlog</th>--}}
                {{--<th scope="col">In progress</th>--}}
                {{--<th scope="col">Done</th>--}}
                {{--<th scope="col">Failure</th>--}}
            </tr>
            </thead>
            <tbody>
            <tr>
                <th scope="row">Lessen</th>
                <td>
                    <div class="card blipd-card m-3">
                        <div class="card-body">Basic cardBasic cardBasic cardBasic cardBasic cardBasic<br>Basic
                            cardBasic cardBasic cardBasic cardBasic cardBasic<br>Basic cardBasic cardBasic cardBasic
                            cardBasic cardBasic<br></div>
                    </div>
                    <div class="card blipd-card m-3">
                        <div class="card-body">Basic card</div>
                    </div>
                </td>
                <td>
                    <div class="card blipd-card m-3">
                        <div class="card-body">Basic card</div>
                    </div>
                    <div class="card blipd-card m-3">
                        <div class="card-body">Basic card</div>
                    </div>
                </td>
                <td>
                    <div class="card blipd-card m-3">
                        <div class="card-body">Basic card</div>
                    </div>
                    <div class="card blipd-card m-3">
                        <div class="card-body">Basic card</div>
                    </div>
                </td>
                <td>
                    <div class="card blipd-card m-3">
                        <div class="card-body">Basic card</div>
                    </div>
                    <div class="card blipd-card m-3">
                        <div class="card-body">Basic card</div>
                    </div>

                </td>
            </tr>
            <tr>
                <th scope="row">Opdrachten</th>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection