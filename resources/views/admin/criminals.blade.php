<x-app-layout>
    <div class="row">
        <div class="col-12 grid-margin">
          <div class="card">
            <div class="card-body">

                <div>
                    <h4 class="card-title">Criminals</h4>
                    <a href="{{route('admin-new-criminal')}}" class="btn btn-primary">Add New</a>
                </div>
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Fullname</th>
                      <th>Crime</th>
                      <th>Place</th>
                      <th>Description</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                        $count = 0;
                    @endphp
                    @foreach ($criminals as $item)
                        <tr>
                            <td>
                                @php
                                    $count ++;
                                    echo $count;
                                @endphp
                            </td>
                            <td><a href="#"> {{$item->fullname}} </a></td>
                            <td> {{$item->crime_id}} </td>
                            <td> {{$item->place_id}} </td>
                            <td> {{$item->description}} </td>
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
