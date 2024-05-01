<x-menuLayout>


    <style>
        * {
            font-family: 'Poppins', sans-serif;
            font-weight: bold;
        }

        #textStyle {

            color: #000;
            font-size: 25px;
        }

        header {
            margin-left: 18%;
        }

        @media (min-width: 992px) {


            .main-content {

                padding: 20px;
                display: flex;
                justify-content: space-between;
            }

            .card {
                flex: 0 0 calc(50% - 10px);
            }
        }

        @media (max-width: 991.98px) {


            .main-content {
                padding: 20px;
                display: flex;
                flex-direction: column;
            }

            .card {
                width: 100%;
                margin-bottom: 20px;
            }
        }

        .card {

            width: 100%;
            margin: 0 auto;
            border-radius: 10px;
            overflow: hidden;
            overflow-y: auto;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
        }

        .progress-container {
            display: flex;
            align-items: center;
        }

        .progress-bar {
            background-color: #579792;
        }

        .progress-wrapper {
            flex: 1;
            margin-left: 10px;
        }

        .progress {
            width: 100%;
        }

        #div1.col,
        #div2.col,
        #div3.col,
        #div4.col {

            color: black;
            background-color: #DCDCDF;
            border: white solid px;
            border-radius: 5%;
            padding: 20px;
            width: 100%;
        }

        #input-text,
        textarea {
            background-color: #579792;
        }

        #staticUsername {
            border-radius: 5px;
            color: white;
            background-color: #579792;
            padding-left: 3%;
            font-weight: normal;
        }

        .animated-element {
            text-align: center;

            height: 40;
            animation: fadeInOut 2s infinite;
            padding-bottom: 0%;
            margin-bottom: 0%;
        }
    </style>
    <div>
        <span style="font-size: 35px;">        
            <i class="fas fa-star fa-lg md-3" style="font-size: 50px; color: #8971f6;margin-left:10%;text-align: start;vertical-align: sub;"></i>
            Admin View</span>
    </div>
    <main class="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="card" style="background-color:#f7f5f5;">
                        <img src={{ asset($userPreferences->avatar) }} class="card-img-top" style="height: 285px;">

                        <div class="card-body">
                            <h1 class="card-title" style="font-size: 30px;">{{ $user->name }}</h1>
                            <p style="font-size: 15px; font-weight: lighter">{{ $userPreferences->major }}, {{ $userPreferences->campus }}
                            <p>
                            <p class="card-text" style=" font-weight: normal">{{ $userPreferences->description }} </p>

                            <div style="display:flex; margin-top:1%; justify-content: space-between">
                              
<a href="#" class="btn"
style="background-color: #579792; width: 33%; color: white; font-size: larger; float: right; "
data-bs-toggle="modal" data-bs-target="#editBioModal">EDIT DESCRIPTION</a>

                                <form id="delete-avatar-form" action="{{ route('delete.avatar', ['userid' => $user->id]) }}" method="POST" style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                                <a href="#" class="btn"
                                    style="background-color: #7d9757; width: 33%; color: white; font-size: larger; float: right; "
                                    onclick="event.preventDefault(); document.getElementById('delete-avatar-form').submit();">DELETE AVATAR</a>
                                
                            
                            
                                <a href="#" 
                                data-bs-toggle="modal" data-bs-target="#confirmDeleteModal" class="btn btn-primary"
                                    style="border: none;width:33%; background-color:#ff6f28; color: white;font-size: larger; float: right;">DELETE ACCOUNT</a>
                    

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card" style="background-color:#f7f5f5;">
                        <img src={{ asset($userPreferences->timetable) }} class="card-img-top" style="height: 400px;">

                        <div class="card-body">
                            {{-- <h1 class="card-title" style="font-size: 30px;">{{ $user->name }}</h1>
                            <p style="font-size: 15px; font-weight: lighter">{{ $userPreferences->major }}, {{ $userPreferences->campus }}
                            <p>
                            <p class="card-text" style=" font-weight: normal">{{ $userPreferences->description }} </p> --}}



                            <div style="display:flex; margin-top:1%; justify-content: space-between">
                        
                                {{-- <a href="#" class="btn"
                                style="background-color: #579792; width: 55%; color: white; font-size: larger; float: right; "
                                data-bs-toggle="modal" data-bs-target="#contactInfoModal"> View contact</a> --}}
                                <form id="delete-timetable-form" action="{{ route('delete.timetable', ['userid' => $user->id]) }}" method="POST" style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                                <a href="#" class="btn"
                                    style="background-color: #7d9757; width: 100%; color: white; font-size: larger; float: right; "
                                    onclick="event.preventDefault(); document.getElementById('delete-avatar-form').submit();">DELETE TIMETABLE</a>
                    
                            </div>
                        </div>
                     </div>
                    
         
    
            </div>
        </div>
        <div class="modal fade" id="confirmDeleteModal" tabindex="-1"
                                aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="confirmDeleteModalLabel">Confirm Delete</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure you want to delete this account?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Cancel</button>
                                            <form action="{{ route('softDeleteUser', ['id' => $user->id]) }}"
                                                method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-danger"
                                                    style="background-color:#FF6F28 ">Yes, Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- adminprofile.blade.php -->


<!-- Edit Bio Modal -->
<div class="modal fade" id="editBioModal" tabindex="-1" aria-labelledby="editBioModalLabel" aria-hidden="true">
 <div class="modal-dialog">
     <div class="modal-content">
         <div class="modal-header">
             <h5 class="modal-title" id="editBioModalLabel">Edit Description</h5>
             <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <form action="{{ route('edit.bio', ['userid' => $user->id]) }}" method="POST">
             @csrf
             @method('PUT')
             <div class="modal-body">
                 <div class="form-group">
                     <label for="bio">Description:</label>
                     <textarea class="form-control" id="bio" name="bio" rows="3">{{ $userPreferences->bio }}</textarea>
                 </div>
             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                 <button type="submit" class="btn btn-danger"
                 style="background-color:#FF6F28 ">Save Changes</button>
             </div>
         </form>
     </div>
 </div>
</div>

    </main>

    </body>

    </html>

</x-menuLayout>
