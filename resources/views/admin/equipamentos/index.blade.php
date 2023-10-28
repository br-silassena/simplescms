@extends('layouts.admin')

@section('css')

@endsection

@section('content')


<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">

        <div class="card-header">
            <h4 class="card-title">Equipamentos</h4>
        </div>

        <div class="card-body">

            <button type="button" class="btn btn-primary" id="btn-cadastrar">Novo</button>
            
            <div class="table-responsive pt-3">

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Valor</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($listagem['result'] as $equipamento)
                        <tr>
                            <th scope="row">{{ $equipamento->id }}</th>
                            <td>{{ $equipamento->nome }}</td>
                            <td>{{ $equipamento->valor }}</td>
                            <td>
                                <button class="btn btn-primary" style="padding:5px 10px" onclick="edit({{ $equipamento->id }})">
                                    <i class="fa fa-pencil-square" aria-hidden="true"></i>
                                </button>
                                <button class="btn btn-danger" style="padding:5px 10px" onclick="del({{ $equipamento->id }})">
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                {!! $listagem['links'] ?? '' !!}

            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="formModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">

    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="formModalLabel">Equipamento</h1>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                @include('admin.equipamentos.form')
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="btn-salvar">Salvar</button>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')

<script>

    let base_url = "{{ asset('') }}";

    async function edit(id) {

        $('#id').val(id);

        let dados = await $.ajax({
                type: "GET",
                dataType: "json",
                url: base_url + 'admin/equipamentos/'+id+'/edit'
            });

        setForm(dados);

        $('#formModal').modal('show');
    }

    function setForm(dados)
    {
        $.each(dados, function(index, values) {
            $(`#formCadastro [name="${index}"]`).val(values);
        });
    }

    async function del(id) {

        let remover = window.confirm('tem certeza que deseja remover esse registro ?');

        if(remover) {

            $.ajax({
                type: "DELETE",
                dataType: "json",
                url: base_url + 'admin/equipamentos/'+id,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    alert("Resposta do servidor: " + response);
                    location.reload(true);
                },
                error: function(error) {
                    alert(error.responseText);
                }
            });
        }
    }

    window.onload = function() {

        $('#btn-cadastrar').click(() => {

            $('#id').val("");

            $('#formModal').modal('show');
        });

        $('#btn-salvar').click(() => {

            let dados = $('#formCadastro').serializeArray();
            let restUrl = base_url + 'admin/equipamentos';
            let _method =  'POST';

            //entra aqui quando for edicao
            if($('#id').val() !== '') {

                dados.push({name: '_method', value: 'PUT'}) ;
                restUrl = base_url + 'admin/equipamentos/'+ $('#id').val();
                console.log(dados);
            }

            // Faz a requisição AJAX
            $.ajax({
                type: "POST",
                dataType: "json",
                url: restUrl,
                data: dados,
                success: function(response) {
                    alert("Resposta do servidor: " + response);
                    location.reload(true);
                },
                error: function(error) {
                    alert(error.responseText);
                }
            });

            $("#formCadastro")[0].reset();

            $('#formModal').modal('hide');
        });

    };
</script>

@endsection