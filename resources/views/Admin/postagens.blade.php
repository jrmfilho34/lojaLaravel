@extends('Admin.layouts.headeer')
@section('content')
<div class="container"><!-- 1-->
  <div class="row"><!-- 2-->
    <div class="col-md-12"><!--3-->
      <div class="card card-default"><!-- 4-->
        <div class="card-header"><!--5-->
          <div class="row"><!--6-->
            <div class="col-md-12"><!--7-->
              <strong>Faça o upload das imagens </strong>
            </div><!-- 7-->
          </div><!--6-->
        </div><!--5-->
        <div class="card-body"><!-- 8-->
            <!--  <form action="{{ route('postar') }}" enctype="multipart/form-data" class="dropzone" id="fileupload" method="POST">
                  @csrf
                  <div class="fallback">
                  <input name="file" type="file" multiple accept="image/jpeg, image/png, image/jpg" />
                  </div>
              </form>-->
          <form action="{{ route('postar')}}" method="POST" enctype="multipart/form-data">
                <div class="container">
                  <div class="row">
                    <div class="col-sm">
                      <div class="uploader">  
                        <input id="file-upload" type="file" name="fileUpload" accept="image/*" />
                        <label for="file-upload" id="file-drag">
                          <img id="file-image" src="#" alt="Preview" class="hidden">
                          <div id="start">
                            <i class="fa fa-download" aria-hidden="true"></i>
                            <div>Selecione outra imagem</div>
                            <div id="notimage" class="hidden">Please select an image</div>
                            <span id="file-upload-btn" class="btn btn-primary">Clique aqui</span>
                          </div>
                          <div id="response" class="hidden">
                            <div id="messages"></div>
                            <progress class="progress" id="file-progress" value="0">
                              <span>0</span>%
                            </progress>
                          </div>
                        </label>
                      </div>
                    </div>
                    <div class="col-sm">
                      <div class="uploader">  
                        <input id="file-upload1" type="file" name="fileUpload1" accept="image/*" />
                        <label for="file-upload1" id="file-drag1">
                          <img id="file-image1" src="#" alt="Preview" class="hidden">
                          <div id="start1">
                            <i class="fa fa-download" aria-hidden="true"></i>
                            <div>Selecione outra imagem</div>
                            <div id="notimage1" class="hidden">Please select an image</div>
                            <span id="file-upload-btn" class="btn btn-primary">Clique aqui</span>
                          </div>
                          <div id="response1" class="hidden">
                            <div id="messages1"></div>
                            <progress class="progress" id="file-progress1" value="0">
                              <span>0</span>%
                            </progress>
                          </div>
                        </label>
                      </div>
                    </div>
                    <div class="col-sm">
                      <div class="uploader">  
                        <input id="file-upload2" type="file" name="fileUpload2" accept="image/*" />
                        <label for="file-upload2" id="file-drag2">
                          <img id="file-image2" src="#" alt="Preview" class="hidden">
                          <div id="start2">
                            <i class="fa fa-download" aria-hidden="true"></i>
                            <div>Selecione outra imagem</div>
                            <div id="notimage2" class="hidden">Please select an image</div>
                            <span id="file-upload-btn" class="btn btn-primary">Clique aqui</span>
                          </div>
                          <div id="response2" class="hidden">
                            <div id="messages2"></div>
                            <progress class="progress" id="file-progress2" value="0">
                              <span>0</span>%
                            </progress>
                          </div>
                        </label>
                      </div>
                    </div>
                  </div>
                </div>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group"><!-- 9-->
                  <label for="formGroupExampleInput">Título</label>
                  <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Título" name="titulo">
                </div><!-- 9-->
                <div class="form-group"><!--10-->
                  <label for="formGroupExampleInput">Preço</label>
                  <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Preço" name="preco">
                </div><!-- 10-->
                <div class="form-group"><!-- 11-->
                  <label for="exampleFormControlSelect1">Selecione a area de exposição</label>
                  <select class="form-control" id="exampleFormControlSelect1" name="categoria">
                    <option>Femininos</option>
                    <option>Masculinos</option>
                    <option>Infantil</option>
                    <option>Plus size</option>
                    <option>Gestantes</option>
                  </select>
                </div><!--11-->
                <div class="form-group"><!--12-->
                  <label for="exampleFormControlTextarea1">Descrição</label>
                  <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="descricao"></textarea>
                </div><!--12-->
                <div class="card-footer bg-transparent border-success"><!--13-->
                <button type="submit" class="btn btn-primary">Criar</button>
                </div><!-- 13-->
          </form>
      </div><!--3-->
    </div><!--2-->
  </div><!-- 1-->
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included -->
<script src="js/upload/js/vendor/jquery.ui.widget.js"></script>
<!-- The Load Image plugin is included for the preview images and image resizing functionality -->
<script src="https://blueimp.github.io/JavaScript-Load-Image/js/load-image.all.min.js"></script>
<!-- The Canvas to Blob plugin is included for image resizing functionality -->
<script src="https://blueimp.github.io/JavaScript-Canvas-to-Blob/js/canvas-to-blob.min.js"></script>
<!-- Bootstrap JS is not required, but included for the responsive demo navigation -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
<script src="js/upload/js/jquery.iframe-transport.js"></script>
<script src="js/dropzone.js"></script>
<script type="text/javascript">

 /* Dropzone.options.fileupload = {
    accept: function (file, done) {
      if (file.type != "application/vnd.ms-excel" && file.type != "image/jpeg, image/png, image/jpg") {
        done("Error! Files of this type are not accepted");
      } else {
        done();
      }
    }
  }

Dropzone.options.fileupload = {
  acceptedFiles: "image/jpeg, image/png, image/jpg"
}

if (typeof Dropzone != 'undefined') {
  Dropzone.autoDiscover = false;
}

;
(function ($, window, undefined) {
  "use strict";

  $(document).ready(function () {
    // Dropzone Example
    if (typeof Dropzone != 'undefined') {
      if ($("#fileupload").length) {
        var dz = new Dropzone("#fileupload"),
          dze_info = $("#dze_info"),
          status = {
            uploaded: 0,
            errors: 0
          };
        var $f = $('<tr><td class="name"></td><td class="size"></td><td class="type"></td><td class="status"></td></tr>');
        dz.on("success", function (file, responseText) {

            var _$f = $f.clone();

            _$f.addClass('success');

            _$f.find('.name').html(file.name);
            if (file.size < 1024) {
              _$f.find('.size').html(parseInt(file.size) + ' KB');
            } else {
              _$f.find('.size').html(parseInt(file.size / 1024, 10) + ' KB');
            }
            _$f.find('.type').html(file.type);
            _$f.find('.status').html('Uploaded <i class="entypo-check"></i>');

            dze_info.find('tbody').append(_$f);

            status.uploaded++;

            dze_info.find('tfoot td').html('<span class="label label-success">' + status.uploaded + ' uploaded</span> <span class="label label-danger">' + status.errors + ' not uploaded</span>');

            toastr.success('Your File Uploaded Successfully!!', 'Success Alert', {
              timeOut: 50000000
            });

          })
          .on('error', function (file) {
            var _$f = $f.clone();

            dze_info.removeClass('hidden');

            _$f.addClass('danger');

            _$f.find('.name').html(file.name);
            _$f.find('.size').html(parseInt(file.size / 1024, 10) + ' KB');
            _$f.find('.type').html(file.type);
            _$f.find('.status').html('Uploaded <i class="entypo-cancel"></i>');

            dze_info.find('tbody').append(_$f);

            status.errors++;

            dze_info.find('tfoot td').html('<span class="label label-success">' + status.uploaded + ' uploaded</span> <span class="label label-danger">' + status.errors + ' not uploaded</span>');

            toastr.error('Your File Uploaded Not Successfully!!', 'Error Alert', {
              timeOut: 5000
            });
          });
      }
    }
  });
})(jQuery, window); */
</script>
  </div>
@endsection
