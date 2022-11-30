<x-app-layout>
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-pin"></i>
            </span>
            Create Criminal
        </h3>
        <nav aria-label="breadcrumb">
            <ul class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                    <span></span>
                    Add Criminal
                    <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                </li>
            </ul>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Add Criminal</h4>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if (Session::has('success'))
                        <div class="alert alert-success" role="alert">
                            {{Session::get('success')}}
                        </div>
                    @endif
                    @if (Session::has('error'))
                        <div class="alert alert-danger" role="alert">
                            {{Session::get('error')}}
                        </div>
                    @endif
                    <form class="forms-sample" action="{{route('admin-add-criminal')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputName1">Fullname</label>
                            <input type="text" name="fullname" class="form-control" id="exampleInputName1" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Crime</label>
                            <select name="crime_id" class="form-control" id="exampleInputName1" required>
                                <option selected disabled>Select Crime</option>
                                @foreach (\App\Models\Crime::all() as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Place</label>
                            <select name="place_id" class="form-control" id="exampleInputName1" required>
                                <option selected disabled>Select Place</option>
                                @foreach (\App\Models\Place::all() as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Description</label>
                            <input type="text" name="description" class="form-control" id="exampleInputName1" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Image</label>
                            <input type="file" name="image" class="form-control" id="exampleInputName1" required>
                        </div>
                        <button type="submit" class="btn btn-gradient-primary me-2">Save</button>
                        <button type="reset" class="btn btn-light">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
