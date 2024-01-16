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
                            <li class="breadcrumb-item active" aria-current="page">Liste des Programmes</li>
                        </ol>
                    </nav>
                    <!-- End Breadcrumb -->

                    <div class="mb-3 mb-md-4 d-flex justify-content-between">
                        <div class="h3 mb-0">Programmes</div>
                    </div>


                    <!-- Users -->
                    <div class="table-responsive-xl">
                        <table class="table text-nowrap mb-0">
                            <thead>
                            <tr>
                                <th class="font-weight-semi-bold border-top-0 py-2">N°</th>
                                <th class="font-weight-semi-bold border-top-0 py-2">Nom Candidat</th>
                                <th class="font-weight-semi-bold border-top-0 py-2">Email</th>
                                <th class="font-weight-semi-bold border-top-0 py-2">Fonctions</th>
                                <th class="font-weight-semi-bold border-top-0 py-2">Projets</th>
                                <th class="font-weight-semi-bold border-top-0 py-2">Document</th>
                                <th class="font-weight-semi-bold border-top-0 py-2">Appréciation</th>
                                @if(auth()->user()->email=='sambagueye326@gmail.com')
                                <th class="font-weight-semi-bold border-top-0 py-2">Actions</th>
                                @endif
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($programmes as $p)
                            <tr>
                                <td class="py-3">{{$loop->iteration}}</td>
                                <td class="align-middle py-3">
                                    <div class="d-flex align-items-center">
                                        <div class="position-relative mr-2">
                                            <span class="indicator indicator-lg indicator-bordered-reverse indicator-top-left indicator-success rounded-circle"></span>
                                            <!--img class="avatar rounded-circle" src="#" alt="John Doe"-->
                                            <span class="avatar-placeholder mr-md-2">P</span>
                                        </div>
                                        {{$p->prenom_candidat}} {{$p->nom_candidat}}
                                    </div>
                                </td>
                                <td class="py-3">{{$p->email_candidat}}</td>
                                <td class="py-3">{{$p->fonction_candidat}}</td>
                                <td class="py-3">{{$p->projet}}</td>
                                <td class="py-3"><a href="">Voir les secteurs</a></td>
                                <td class="py-3">
                                    <a href="{{'Programmes_file/'.$p->document}}" target="_blank">Voir le document

                                    </a>
                                </td>
                                <td class="py-3">
                                        <div>
                                            <!-- Contenu de l'élément -->

                                            <form action="{{ route('toggle-like', ['likedItemId' => $p->id, 'likedItemType' => 'programmes']) }}" method="post">
                                                @csrf
                                                <button class="badge badge-pill badge-success"  type="submit">
                                                    {{ auth()->user()->likes()
                                                        ->where('liked_item_id', $p->id)
                                                        ->where('liked_item_type', 'programmes')
                                                        ->exists() ? 'Unlike' : 'Like' }}
                                                </button>

                                            </form>
                                        </div>

                                </td>
                                @if(auth()->user()->email=='sambagueye326@gmail.com')
                                <td class="py-3">
                                    <div class="position-relative">
                                        <a class="link-dark d-inline-block" type="button" href="{{route('programmes.edit',$p->id)}}">
                                            <i class="gd-pencil icon-text"></i>
                                        </a>
                                        <form action="{{route('programmes.destroy',$p->id)}}" method="post" type="button">
                                            @csrf
                                            @method('DELETE')
                                            <button  style="background: none; color: inherit; border: none; padding: 0; font: inherit; cursor: pointer; outline: inherit;" class="link-dark d-inline-block" >
                                                <i class="gd-trash icon-text"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                                @endif
                            </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="card-footer d-block d-md-flex align-items-center d-print-none">
                            <div class="d-flex mb-2 mb-md-0">Showing {{auth()->user()->id}} to {{auth()->user()->id}} of 24 Entries</div>

                            <nav class="d-flex ml-md-auto d-print-none" aria-label="Pagination"><ul class="pagination justify-content-end font-weight-semi-bold mb-0">				<li class="page-item">				<a id="datatablePaginationPrev" class="page-link" href="#!" aria-label="Previous"><i class="gd-angle-left icon-text icon-text-xs d-inline-block"></i></a>				</li><li class="page-item d-none d-md-block"><a id="datatablePaginationPage0" class="page-link active" href="#!" data-dt-page-to="0">1</a></li><li class="page-item d-none d-md-block"><a id="datatablePagination1" class="page-link" href="#!" data-dt-page-to="1">2</a></li><li class="page-item d-none d-md-block"><a id="datatablePagination2" class="page-link" href="#!" data-dt-page-to="2">3</a></li><li class="page-item">				<a id="datatablePaginationNext" class="page-link" href="#!" aria-label="Next"><i class="gd-angle-right icon-text icon-text-xs d-inline-block"></i></a>				</li>				</ul></nav>
                        </div>
                    </div>
                    <!-- End Users -->
                </div>
            </div>


        </div>


    </div>
</main>


<script src="{{asset('graindashboard/js/graindashboard.js')}}"></script>
<script src="{{asset('graindashboard/js/graindashboard.vendor.js')}}"></script>

</body>
</html>
