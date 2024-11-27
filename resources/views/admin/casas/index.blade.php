@extends('adminlte::page')
{{-- Setup Custom Preloader Content --}}

@section('preloader')
    <i class="fas fa-4x fa-spin fa-spinner text-secondary"></i>
    <h4 class="mt-4 text-dark">Loading</h4>
@stop

{{-- Setup Custom Footer Content --}}

@section('content')
{{--    <div class="row">--}}
{{--        <div class="col-md-12">--}}
{{--            <div class="card card-primary card-outline">--}}
{{--                <div class="card-header">--}}
{{--                    <h3 class="card-title text-dark">Casas</h3>--}}
{{--                    <div class="card-tools text-right">--}}
{{--                        <a href="{{ route('admin.casas.create') }}" class="btn btn-primary">--}}
{{--                            <i class="fas fa-plus"></i> Adicionar--}}
{{--                        </a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="card-body">--}}
{{--                    <table class="table table-striped">--}}
{{--                        <thead>--}}
{{--                            <tr>--}}
{{--                                <th>Nome</th>--}}
{{--                                <th>Endereço</th>--}}
{{--                                <th>Preço</th>--}}
{{--                                <th>Ações</th>--}}
{{--                            </tr>--}}
{{--                        </thead>--}}
{{--                        <tbody>--}}
{{--                            @foreach($casas as $casa)--}}
{{--                                <tr>--}}
{{--                                    <td>{{ $casa->nome }}</td>--}}
{{--                                    <td>{{ $casa->endereco }}</td>--}}
{{--                                    <td>{{ $casa->preco }}</td>--}}
{{--                                    <td>--}}
{{--                                        <a href="{{ route('admin.casas.edit', $casa->id) }}" class="btn btn-primary btn-sm">--}}
{{--                                            <i class="fas fa-edit"></i>--}}
{{--                                        </a>--}}
{{--                                        <a href="{{ route('admin.casas.show', $casa->id) }}" class="btn btn-info btn-sm">--}}
{{--                                            <i class="fas fa-eye text-white"></i>--}}
{{--                                        </a>--}}
{{--                                        <form action="{{ route('admin.casas.destroy', $casa->id) }}" method="post" class="d-inline">--}}
{{--                                            @csrf--}}
{{--                                            @method('DELETE')--}}
{{--                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir?')">--}}
{{--                                                <i class="fas fa-trash"></i>--}}
{{--                                            </button>--}}
{{--                                        </form>--}}
{{--                                    </td>--}}
{{--                                </tr>--}}
{{--                            @endforeach--}}
{{--                        </tbody>--}}
{{--                    </table>--}}
{{--                </div>--}}
{{--                <div class="card-footer">--}}
{{--                    {{ $casas->links() }}--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}


    <livewire:casas />

@endsection

@section('footer')
    <div class="row">
        <div class="col-md-6">
            <p class="text-sm">
                <strong>Version</strong> 1.0.0
            </p>
        </div>
        <div class="col-md-6 text-right">
            <p class="text-sm">
                <strong>Developed by</strong> <a href="www.icaromoura.com" target="_blank">Ícaro Moura</a>
            </p>
        </div>
    </div>
@stop
