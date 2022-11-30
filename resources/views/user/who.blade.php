<x-app-layout>
    <div class="row">
        <div class="col-12 grid-margin">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Criminals</h4>
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th> Fullname </th>
                      <th> Crime </th>
                      <th> Location </th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($criminals as $item)
                    @php
                        $crime = \App\Models\Crime::find($item->crime_id);
                        $location = \App\Models\Place::find($item->place_id);
                    @endphp
                        <tr>
                            <td>
                                <img src="{{asset('images')}}/{{$item->image}}" class="me-2" alt="image">{{$item->fullname}}
                            </td>
                            <td>{{$crime->name}}</td>
                            <td>
                                {{$location->name}}
                            </td>
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
