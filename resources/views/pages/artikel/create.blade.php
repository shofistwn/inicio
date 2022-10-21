<!doctype html>
    <html lang="en">
        <head>
            <!-- Required meta tags -->
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

            <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400|Source+Code+Pro:700,900&display=swap" rel="stylesheet">
            <!-- Bootstrap CSS -->
            <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
            <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
            <link rel="stylesheet" href="assets/css/style.css">
            <link rel="stylesheet" href="assets/css/responsive.css">

            <link href="assets/lib/slick/slick.css" rel="stylesheet">
            <link href="assets/lib/slick/slick-theme.css" rel="stylesheet">

            <!-- Google Fonts -->
            <link href="https://fonts.googleapis.com/css?family=Viga" rel="stylesheet">

            <title>Tambah Artikel</title>
    </head>  
<body>


 <div class="add-artikel">
    <div class="container-fluid"> 
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="container-fluid">
            <div class="row mt-3 justify-content-center">
                <div class="col-lg-12">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <button class="btn btn-primary"><i class="fas fa-arrow-left"></i>&nbsp; Back</button>
                        </div>
                            <div class="card-body">
                                <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <div class="form-group">
                                        <label class="control-label form-label">Upload foto</label>
                                    <div class="preview-zone hidden">
                                        <div class="box box-solid">
                                        <div class="box-body mt-3"></div>
                                        </div>
                                    </div>
                                <div class="dropzone-wrapper mb-2">
                                    <div class="dropzone-desc">
                                        <img width="280px" class="d-none spinner-loading" src="" alt="">
                                        <i class="fas fa-download download-icon"></i>
                                        <p class="dropzone-desc-text">Choose an image file or drag it here.</p>
                                    </div>
                                        <input type="file" name="photo" class="dropzone">
                                    </div>
                                      <div class="row justify-content-between">
                                        <div class="col-lg-5">
                                          <a href="#" class="text-danger remove-preview"><i class="fa fa-times"></i>&nbsp; Reset the field</a>
                                        </div>
                                        
                                            <div class="col-lg-5">
                                                <small class="text-danger error-upload"></small>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 mt-2">
                                                <label>Judul</label>
                                                <input class="form-control" type="text" placeholder="judul artikel">
                                            </div>
                                            <div class="col-md-6 mt-2">
                                                <label>Kategori</label>
                                                    <select class="custom-select">
                                                        <option selected>kategori artikel</option>
                                                        <option>Penyakit</option>
                                                        <option>Kesehatan Lansia</option>
                                                        <option>Hidup Sehat</option>
                                                    </select>
                                                </div>
                                        </div>
                                    </div>
                                        <div class="form-group">
                                            <label for="caption" class="form-label">Caption</label>
                                            <textarea class="form-control" name="caption" id="caption" rows="3" style="resize: none; height: 150px; padding: 15px;" placeholder="sertakan deskripsi.."></textarea>
                                        </div>
                                            <button type="submit" id="btn-upload" class="btn btn-primary">Post Artikel</button>
                                            <button class="btn btn-primary d-none" id="btn-upload-loading" type="button">
                                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                            Loading...
                                        </button>
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
    </div>
</div>


<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="assets/lib/easing/easing.min.js"></script>
<script src="assets/lib/slick/slick.min.js"></script>

<!-- Template Javascript -->
<script src="assets/js/main.js"></script>
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>