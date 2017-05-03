@extends('layouts.app')



@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="form-group row add">
                        <div class="col-md-12">
                            <h1>Mensagens Tigresa VIP</h1>
                        </div>

                    </div>
                </div>

                {{--<div class="panel-body">--}}
                    {{--<div class="row">--}}
                        {{--<div class="col-md-12">--}}
                            {{--<form method="post" action="#">--}}
                                {{--<textarea name="message">Digite o conteúdo do email...</textarea>--}}
                            {{--</form>--}}

                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="row">--}}
                        {{--<div class="col-md-12">--}}
                            {{--<button disabled type="button" class="btn btn-primary pull-right">--}}
                                {{--Enviar Mensagem--}}
                            {{--</button>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                <div class="panel-body" id="manage-vue">
                    <h2>Lista de usuários:</h2>
                    <div class="row">
                        <div class="col-md-12">
                            <button type="button" data-toggle="modal" data-target="#create-item"
                                    class="btn btn-primary">
                                Novo Item
                            </button>
                        </div>
                        <div v-for="item in items" class="col-md-12">
                            <div class="pull-right">
                                <button  class="edit-modal btn btn-warning" @click.prevent="editItem(item)">
                                    <span class="glyphicon glyphicon-edit"></span> Editar
                                </button>
                                <button  class="edit-modal btn btn-danger" @click.prevent="deleteItem(item)">
                                    <span class="glyphicon glyphicon-trash"></span> Apagar
                                </button>
                            </div>
                            <ul>
                                <li>Username: @{{ item.username }}</li>
                                <li>Email: @{{ item.email }}</li>
                                <li>Status: @{{ item.status }}</li>
                                <li>Facebook: @{{ item.facebook_id }}</li>
                            </ul>
                        </div>

                    </div>

                    <nav>
                        <ul class="pagination">
                            <li v-if="pagination.current_page > 1">
                                <a href="#" aria-label="Previous" @click.prevent="changePage(pagination.current_page - 1)">
                                    <span aria-hidden="true">«</span>
                                </a>
                            </li>
                            <li v-for="page in pagesNumber" v-bind:class="[ page == isActived ? 'active' : '']">
                                <a href="#" @click.prevent="changePage(page)">
                                    @{{ page }}
                                </a>
                            </li>
                            <li v-if="pagination.current_page < pagination.last_page">
                                <a href="#" aria-label="Next" @click.prevent="changePage(pagination.current_page + 1)">
                                    <span aria-hidden="true">»</span>
                                </a>
                            </li>
                        </ul>
                    </nav>

                    <!-- Create Item Modal -->
                    <div class="modal fade" id="create-item" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                    <h4 class="modal-title" id="myModalLabel">Create New Post</h4>
                                </div>
                                <div class="modal-body">
                                    <form method="post" enctype="multipart/form-data" v-on:submit.prevent="createItem">
                                        <div class="form-group">
                                            <label for="greeting">Introdução:</label>
                                            <input type="text" name="greeting" class="form-control" v-model="newItem.greeting" />
                                            <span v-if="formErrors['greeting']" class="error text-danger">
                                                @{{ formErrors['greeting'] }}
                                            </span>
                                        </div>
                                        <div class="form-group">
                                            <label for="title">Title:</label>
                                            <input type="text" name="title" class="form-control" v-model="newItem.title" />
                                            <span v-if="formErrors['title']" class="error text-danger">
                                                @{{ formErrors['title'] }}
                                            </span>
                                        </div>
                                        <div class="form-group">
                                            <label for="title">Description:</label>
                                            <textarea name="description" class="form-control" v-model="newItem.description">
                                            </textarea>
                                            <span v-if="formErrors['description']" class="error text-danger">
                                                @{{ formErrors['description'] }}
                                            </span>
                                        </div>
                                        <div class="form-group">
                                            <label for="salutation">Saudação:</label>
                                            <input type="text" name="salutation" class="form-control" v-model="newItem.salutation" />
                                            <span v-if="formErrors['salutation']" class="error text-danger">
                                                @{{ formErrors['salutation'] }}
                                            </span>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-success">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Edit Item Modal -->
                    <div class="modal fade" id="edit-item" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                    <h4 class="modal-title" id="myModalLabel">Edit Blog Post</h4>
                                </div>
                                <div class="modal-body">
                                    <form method="post" enctype="multipart/form-data" v-on:submit.prevent="updateItem(fillItem.id)">
                                        <div class="form-group">
                                            <label for="title">Title:</label>
                                            <input type="text" name="title" class="form-control" v-model="fillItem.username" />
                                            <span v-if="formErrorsUpdate['title']" class="error text-danger">
                                                @{{ formErrorsUpdate['title'] }}
                                            </span>
                                        </div>
                                        <div class="form-group">
                                            <label for="title">Description:</label>
                                            <textarea name="description" class="form-control" v-model="fillItem.email">
                                            </textarea>
                                            <span v-if="formErrorsUpdate['description']" class="error text-danger">
                                                @{{ formErrorsUpdate['description'] }}
                                            </span>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-success">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>
@endsection

@section('stylesheet')

@endsection

@section('javascript')



@endsection
