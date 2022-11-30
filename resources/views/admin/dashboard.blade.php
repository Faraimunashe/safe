<x-app-layout>
    <div class="row">
        <div class="col-12 grid-margin">
          <div class="card">
            <div class="card-body">

                <div>
                    <h4 class="card-title">Advices</h4>
                    <a href="{{route('admin-new-advice')}}" class="btn btn-primary">Add New</a>
                </div>
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Title</th>
                      <th>Content</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                        $count = 0;
                    @endphp
                    @foreach ($advices as $item)
                        <tr>
                            <td>
                                @php
                                    $count ++;
                                    echo $count;
                                @endphp
                            </td>
                            <td><a href="#"> {{$item->title}} </a></td>
                            <td> {{$item->context}} </td>
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
