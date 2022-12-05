<x-layout-component>
    <div class="row justify-content-center mt-5">
        <div class="col-8">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('user.create') }}" class="btn btn-outline-dark">Create</a>
                </div>
                <div class="card-body">
                    @if (session()->has('success'))
                        <div class="alert alert-success">
                            {!! session('success') !!}
                        </div>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Option</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $key => $user)
                                    <tr>
                                        <td>{!! $loop->iteration !!}</td>
                                        <td>{!! $user->name !!}</td>
                                        <td>{!! $user->username !!}</td>
                                        <td>{!! $user->email !!}</td>
                                        <td>
                                            <div class="d-flex btn-group">
                                                <a href="{{ route('user.edit', $user->id) }}"
                                                    class="btn btn-sm btn-outline-primary">Edit</a>
                                                <form method="POST" action="{{ route('user.delete', $user->id) }}">
                                                    @csrf
                                                    @method('delete')
                                                    <button onclick="confirm('are you sure delete this data')"
                                                        class="btn btn-outline-danger btn-sm"
                                                        type="submit">Delete</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    {!! $users->links() !!}
                </div>
            </div>
        </div>
    </div>
</x-layout-component>
