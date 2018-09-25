@extends('layouts.app')
@section('content')

    <form action="/management/admin/" method="get">
        <input type="text" name="query" placeholder="voer hier uw zoekterm in...">
        <input type="submit" value="zoeken">
    </form>

    <form action="/management/admin" method="post">
        {{ csrf_field() }}
        @if($users->count() != 0)
            <table>
                <tr>
                    <th>Voornaam:</th>
                    <th>Tussenvoegsel:</th>
                    <th>Achternaam:</th>
                    <th>Email:</th>
                    <th>Rechten?</th>
                </tr>
                @foreach($users as $user)
                    <tr>
                        <td>{{$user->firstname}}</td>
                        <td>{{$user->insertation}}</td>
                        <td>{{$user->lastname}}</td>
                        <td>{{$user->email}}</td>
                        <td>
                            @if($user->hasRole('sa'))
                                <input type="hidden" value=0 name="noAdmins[{{$user->id}}]">
                                <input type="checkbox" checked="checked" name="noAdmins[{{$user->id}}]" value=1>
                            @else
                                <input type="checkbox" name="admins[]" value="{{$user->id}}">
                            @endif
                        </td>
                    </tr>
                @endforeach
            </table>
        @else
            <p>Er zijn geen gebruikers gevonden.</p>
        @endif
        <input type="submit" value="opslaan">
    </form>

@endsection
