@include('layouts.navbar')
@include('layouts.topnav')
@include('layouts.sidenav')

<div class="content">
        <div class="py-4 px-3 px-md-4">
            <div class="card mb-3 mb-md-4">

                <div class="card-body">
                    <!-- Breadcrumb -->
                    <nav class="d-none d-md-block" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{route('programmes')}}">Programmes</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Création de programme</li>
                        </ol>
                    </nav>
                    <!-- End Breadcrumb -->

                    <div class="mb-3 mb-md-4 d-flex justify-content-between">
                        <div class="h3 mb-0">Ajouter un programme</div>
                    </div>


                    <!-- Form -->
                    <div>
                        <form action="{{route('programmes.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-12 col-md-4">
                                    <label for="name">Prénom</label>
                                    <input type="text" class="form-control" value="" id="name" name="prenom_candidat" placeholder="Prénom">
                                </div>
                                <div class="form-group col-12 col-md-4">
                                    <label for="name">Nom</label>
                                    <input type="text" class="form-control" value="" id="name" name="nom_candidat" placeholder="Nom">
                                </div>
                                <div class="form-group col-12 col-md-4">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" value="" id="email" name="email_candidat" placeholder="Email">
                                </div>
                                <div class="form-group col-12 col-md-4">
                                    <label for="name">Fonction</label>
                                    <input type="text" class="form-control" value="" id="name" name="fonction_candidat" placeholder="fonction">
                                </div>
                                <div class="form-group col-12 col-md-4">
                                    <label for="name">Project</label>
                                    <input type="text" class="form-control" value="" id="name" name="projet" placeholder="Project">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-12 col-md-4">
                                    <label for="document">Document</label>
                                    <input type="file" class="form-control" value="" id="document" name="document" placeholder="Document">
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary float-right">Créer</button>
                        </form>
                    </div>
                    <!-- End Form -->
                </div>
            </div>
        </div>
    </div>
</main>


<script src="{{asset('graindashboard/js/graindashboard.js')}}"></script>
<script src="{{asset('graindashboard/js/graindashboard.vendor.js')}}"></script>

</body>
</html>
