@extends('layouts.admin')
@section('content')
    <div class="container-fluid my-3">
        <div class="row">
            <div class="col">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">N°</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Email</th>
                            <th scope="col">Contenuto</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        @forelse ($messages as $message)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $message->name }}</td>
                                <td>{{ $message->email }}</td>
                                <td>{{ $message->content }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4">Nessun messaggio trovato</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
