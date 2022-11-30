<x-app-layout>
    <div class="row">
        <div class="col-12 grid-margin">
          <div class="card">
            <div class="card-body">

                <div>
                    <h4 class="card-title">Crimes</h4>
                    <a href="{{route('admin-new-crime')}}" class="btn btn-primary">Add New</a>
                </div>
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Name</th>
                      <th>Created At</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                        $count = 0;
                    @endphp
                    @foreach ($crimes as $item)
                        <tr>
                            <td>
                                @php
                                    $count ++;
                                    echo $count;
                                @endphp
                            </td>
                            <td><a href="#"> {{$item->name}} </a></td>
                            <td> {{$item->created_at}} </td>
                        </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
    </div>
</x-app-layout>
