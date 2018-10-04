{{-- Extending the layout --}}
@extends('layouts.app')

{{-- Placeholder for the page-specific content --}}
@section('content')
    <form action="/management/admin/" method="get">
        <input type="text" name="query" placeholder="Vul een naam of email in">
        <input type="submit" value="Zoek">
    </form>

    <form action="/management/admin" method="post">
        {{ csrf_field() }}
        <div class="container" style="overflow: auto;">
            @if($users->count() != 0)
                <table class="table table-striped table-bordered mt-3 mb-3">
                    <tr>
                        <th>Voornaam</th>
                        <th>Tussenvoegsel</th>
                        <th>Achternaam</th>
                        <th>Email</th>
                        <th>Rechten</th>
                    </tr>
                    @foreach($users as $user)
                        <tr>
                            <td>{{$user->firstname}}</td>
                            <td>{{$user->insertion}}</td>
                            <td>{{$user->lastname}}</td>
                            <td>{{$user->email}}</td>
                            <td>
                                @if($user->hasRole('sa'))
                                    <input type="hidden" value=0 name="noAdmins[{{$user->id}}]">
                                    {{--<input type="checkbox" checked="checked" name="noAdmins[{{$user->id}}]" value=1>--}}
                                    <input type="checkbox" checked data-toggle="toggle" data-on="Admin" data-off="User"  name="noAdmins[{{$user->id}}]" value=1>

                                @else
                                    <input type="checkbox" data-toggle="toggle" data-on="Admin" data-off="User" name="admins[]" value="{{$user->id}}">
                                    {{--<input type="checkbox" name="admins[]" value="{{$user->id}}">--}}
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </table>
        </div>
        @else
            <p>Er zijn geen gebruikers gevonden.</p>
        @endif
        <input type="submit" value="Bevestig">
    </form>

@endsection
