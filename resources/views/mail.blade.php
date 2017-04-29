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
                        <div class="col-md-12">
                            <button disabled type="button" data-toggle="modal" data-target="#create-item" class="btn btn-primary">
                                Novo Item
                            </button>
                        </div>
                    </div>
                </div>

                <div class="panel-body">
                    <div class="editable">
                        <div id="toolbar" class="toolbar" style="display: none;">
                            <div class="block">
                                <a data-wysihtml-command="bold" title="CTRL+B">bold</a>
                                <a data-wysihtml-command="italic" title="CTRL+I">italic</a>
                                <a data-wysihtml-command="underline" title="CTRL+U">underline</a>
                            </div>
                            <div class="block">
                                <a data-wysihtml-command="createLink">link</a>
                                <a data-wysihtml-command="removeLink"><s>link</s></a>
                                <a data-wysihtml-command="insertImage">image</a>
                                <a data-wysihtml-command="formatBlock" data-wysihtml-command-value="h1">h1</a>
                                <a data-wysihtml-command="formatBlock" data-wysihtml-command-value="h2">h2</a>
                                <a data-wysihtml-command="formatBlock" data-wysihtml-command-value="h3">h3</a>
                                <a data-wysihtml-command="formatBlock" data-wysihtml-command-value="p">p</a>
                                <a data-wysihtml-command="formatBlock" data-wysihtml-command-value="pre">pre</a>
                                <a data-wysihtml-command="formatBlock" data-wysihtml-command-blank-value="true">plaintext</a>
                                <a data-wysihtml-command="insertBlockQuote">blockquote</a>
                                <a data-wysihtml-command="formatCode" data-wysihtml-command-value="language-html">Code</a>
                            </div>

                            <div class="block">
                                <a data-wysihtml-command="fontSizeStyle">Size</a>
                                <div data-wysihtml-dialog="fontSizeStyle" style="display: none;">
                                    Size:
                                    <input type="text" data-wysihtml-dialog-field="size" style="width: 60px;" value="" />
                                    <a data-wysihtml-dialog-action="save">OK</a>&nbsp;<a data-wysihtml-dialog-action="cancel">Cancel</a>
                                </div>
                            </div>

                            <div class="block">
                                <a data-wysihtml-command="insertUnorderedList">&bull; List</a>
                                <a data-wysihtml-command="insertOrderedList">1. List</a>
                            </div>
                            <div class="block">
                                <a data-wysihtml-command="outdentList">&lt;-</a>
                                <a data-wysihtml-command="indentList">-&gt;</a>
                            </div>

                            <div class="block">
                                <a data-wysihtml-command="alignLeftStyle">alignLeft</a>
                                <a data-wysihtml-command="alignRightStyle">alignRight</a>
                                <a data-wysihtml-command="alignCenterStyle">alignCenter</a>
                            </div>

                            <div class="block">
                                <a data-wysihtml-command="foreColorStyle">Color</a>
                                <div data-wysihtml-dialog="foreColorStyle" style="display: none;">
                                    Color:
                                    <input type="text" data-wysihtml-dialog-field="color" value="rgba(0,0,0,1)" />
                                    <a data-wysihtml-dialog-action="save">OK</a>&nbsp;<a data-wysihtml-dialog-action="cancel">Cancel</a>
                                </div>
                            </div>

                            <div class="block">
                                <a data-wysihtml-command="bgColorStyle">BG Color</a>
                                <div data-wysihtml-dialog="bgColorStyle" style="display: none;">
                                    Color:
                                    <input type="text" data-wysihtml-dialog-field="color" value="rgba(0,0,0,1)" />
                                    <a data-wysihtml-dialog-action="save">OK</a>&nbsp;<a data-wysihtml-dialog-action="cancel">Cancel</a>
                                </div>
                            </div>

                            <div class="block">
                                <a data-wysihtml-command="undo">undo</a>
                                <a data-wysihtml-command="redo">redo</a>
                            </div>

                            <!--div class="block">
                              <a data-wysihtml-action="showSource">HTML</a>
                            </div-->

                            <div class="block" data-wysihtml-hiddentools="table" style="display: none;">
                                <a data-wysihtml-command="mergeTableCells">Merge</a>
                                <a data-wysihtml-command="addTableCells" data-wysihtml-command-value="above">row-before</a>
                                <a data-wysihtml-command="addTableCells" data-wysihtml-command-value="below">row-after</a>
                                <a data-wysihtml-command="addTableCells" data-wysihtml-command-value="before">col-before</a>
                                <a data-wysihtml-command="addTableCells" data-wysihtml-command-value="after">col-after</a>

                                <a data-wysihtml-command="deleteTableCells" data-wysihtml-command-value="row">delete row</a>
                                <a data-wysihtml-command="deleteTableCells" data-wysihtml-command-value="column">delete col</a>

                            </div>


                            <div data-wysihtml-dialog="createLink" style="display: none;">
                                <label>
                                    Link:
                                    <input data-wysihtml-dialog-field="href" value="http://">
                                </label>
                                <a data-wysihtml-dialog-action="save">OK</a>&nbsp;<a data-wysihtml-dialog-action="cancel">Cancel</a>
                            </div>
                            <div data-wysihtml-dialog="insertImage" style="display: none;">
                                <label>
                                    Image:
                                    <input data-wysihtml-dialog-field="src" value="http://">
                                </label>
                                <label>
                                    Align:
                                    <select data-wysihtml-dialog-field="className">
                                        <option value="">default</option>
                                        <option value="wysiwyg-float-left">left</option>
                                        <option value="wysiwyg-float-right">right</option>
                                    </select>
                                </label>
                                <a data-wysihtml-dialog-action="save">OK</a>&nbsp;<a data-wysihtml-dialog-action="cancel">Cancel</a>
                            </div>
                        </div><!-- toolbar -->
                        <div id="editor" data-placeholder="Enter text ...">
                            <h1>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h1>
                            <p>Nullam egestas nisl augue, a fermentum quam laoreet at.</p>
                            <p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
                            <img class="wysiwyg-float-right" src="../img/an-undated-photo-of-albert-einstein-at-new-yorks-saranac-lake-a-newly-digitized-letter-from.jpg" alt="" title=""/>
                            <p>Pellentesque ullamcorper ultrices nibh mollis mattis. Etiam ac fermentum nisi. Sed sagittis porta augue, vel congue mi. Vivamus egestas vestibulum sem, a suscipit libero faucibus ut. Quisque mauris metus, imperdiet at velit a, suscipit fermentum ante. Nullam pretium mauris at risus eleifend ultrices. Vestibulum ullamcorper mattis est non lobortis. Donec consequat magna quis felis mollis tristique. Fusce sed congue felis.
                                Aenean ut nulla orci. Praesent id mollis massa. Fusce interdum eleifend bibendum. Nulla luctus nisl sit amet sapien sodales ornare. Duis blandit, purus eu egestas pretium, nisi augue aliquet quam, non suscipit diam velit eu enim. Suspendisse vulputate nibh et porta eleifend. Pellentesque rhoncus hendrerit quam. Ut sit amet ligula ac tortor porta ullamcorper.
                            </p>
                            <div contentEditable="false" class="wysihtml-uneditable-container wysihtml-uneditable-container-left" style="padding: 10px;">
                                <h1>This content is not editable</h1>
                                <p>thus it is suitable to build own modules of image and videos inside editor.</p>
                                Aenean ut nulla orci. Praesent id mollis massa. Fusce interdum eleifend bibendum. Nulla luctus nisl sit amet sapien sodales ornare. Duis blandit, purus eu egestas pretium, nisi augue aliquet quam, non suscipit diam velit eu enim. Suspendisse vulputate nibh et porta eleifend. Pellentesque rhoncus hendrerit quam. Ut sit amet ligula ac tortor porta ullamcorper.
                            </div>
                            <p>Nulla facilisi. Ut quis pellentesque nisi, eget convallis nisi. Fusce dapibus tortor sem, et blandit nunc porttitor eget. Etiam eu nulla id nibh aliquet semper ut ut lorem. Nullam dapibus massa interdum interdum vehicula. Sed ante urna, pulvinar ut lacinia hendrerit, tristique ut enim. Fusce euismod adipiscing justo, nec malesuada massa sodales a. Integer pulvinar sed ligula et consectetur. Curabitur pulvinar cursus venenatis. Morbi in justo eget ipsum rhoncus accumsan. Sed felis orci, sodales eget est sit amet, sollicitudin lacinia justo. Aliquam et eros faucibus, tincidunt leo at, feugiat eros. Duis malesuada laoreet lorem eu molestie. Nulla vestibulum tincidunt diam ut placerat.</p>

                            <p>Aenean pretium diam nunc, at imperdiet elit vehicula a. Mauris nec felis non sem condimentum adipiscing ut et lacus. Donec facilisis facilisis lacinia. Nam posuere at nulla ut malesuada. Fusce ultricies lectus eu iaculis molestie. Ut consequat id magna et placerat. Nulla sed ante lectus. Donec congue, velit in ultricies tempus, felis lectus tempus sem, non bibendum lorem mi vel lorem. Mauris a placerat dui, nec auctor erat.</p>

                            <p>Suspendisse id mauris vel urna venenatis pharetra. Pellentesque luctus et nulla in vulputate. Donec id ligula id enim congue convallis id eu nibh. Phasellus a leo non dui porta sodales ac vel justo. Etiam sed dignissim ligula. Morbi consequat adipiscing risus vitae accumsan. Curabitur dignissim nec quam non blandit. Etiam venenatis, est a facilisis convallis, mauris nibh ultricies sapien, eget egestas neque eros sed libero. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Maecenas et velit sit amet quam pulvinar accumsan. Donec id sollicitudin dolor.</p>

                            <table>
                                <tr>
                                    <th>This is </th><th>a table</th><th>that can be edited</th>
                                </tr>
                                <tr>
                                    <td>4&nbsp;</td><td>
                                        <table>
                                            <tr>
                                                <td>A nested table</td>
                                                <td rowspan=2>with rowspan</td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp;</td>
                                            </tr>
                                        </table>

                                    </td><td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>7&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="panel-footer" id="manage-vue">
                    <h2>Lista de usuários:</h2>
                    <div class="row">
                        <div v-for="item in items" class="col-md-12">
                            <div class="pull-right">
                                <button disabled class="edit-modal btn btn-warning" @click.prevent="editItem(item)">
                                    <span class="glyphicon glyphicon-edit"></span> Editar
                                </button>
                                <button disabled class="edit-modal btn btn-danger" @click.prevent="deleteItem(item)">
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
                                            <label for="title">Title:</label>
                                            <input type="text" name="title" class="form-control" v-model="newItem.username" />
                                            <span v-if="formErrors['title']" class="error text-danger">
                @{{ formErrors['title'] }}
              </span>
                                        </div>
                                        <div class="form-group">
                                            <label for="title">Description:</label>
                                            <textarea name="description" class="form-control" v-model="newItem.email">
              </textarea>
                                            <span v-if="formErrors['description']" class="error text-danger">
                @{{ formErrors['description'] }}
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
