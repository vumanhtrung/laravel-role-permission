<div class="card">
    <div class="card-header">
        <h3 class="card-title">{{ __('List of Items') }}</h3>
        <div class="card-tools">
            <div class="input-group input-group-sm">
                <input wire:model.debounce.500ms="search" type="text" name="search" class="form-control float-right" placeholder="Search..">
            </div>
        </div>
    </div>
    <div class="card-body">
        <div wire:loading.delay class="col-12 alert alert-info">
            {{ __('Loading...') }}
        </div>
        <table class="table table-striped table-bordered nowrap" style="width:100%">
            <thead>
                <tr>
                    <th>{{ __('Id') }}</th>
                    <th>{{ __('Name') }}</th>
                    <th>{{ __('Email') }}</th>
                    <th>{{ __('Roles') }}</th>
                    <th>{{ __('Action') }}</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        <td>
                            @foreach($item->roles as $key => $entry)
                                <span class="badge bg-primary">{{ $entry->title }}</span>
                            @endforeach
                        </td>
                        <td>
                            <div class="flex justify-end">
                                @can('user_show')
                                    <a href="{{ route("admin.users.show", $item->id) }}" class="btn btn-sq btn-info">
                                        <i class="far fa-eye"></i>
                                    </a>
                                @endcan
                                @can('user_edit')
                                    <a href="{{ route("admin.users.edit", $item->id) }}" class="btn btn-sq btn-primary">
                                        <i class="far fa-edit"></i>
                                    </a>
                                @endcan
                                @if(Gate::check('user_delete') && auth()->user()->id !== $item->id)
                                    <button class="btn btn-sq btn-danger mr-2" wire:click="deleteConfirm({{ $item->id }})" wire:loading.attr="disabled">
                                        <i class="far fa-trash-alt"></i>
                                    </button>
                                @endif
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6">{{ __('No entries found.') }}</td>
                    </tr>
                @endforelse
            </tbody>
            <tfoot>
                <tr>
                    <th>{{ __('Id') }}</th>
                    <th>{{ __('Name') }}</th>
                    <th>{{ __('Email') }}</th>
                    <th>{{ __('Roles') }}</th>
                    <th>{{ __('Action') }}</th>
                </tr>
            </tfoot>
        </table>
    </div>
    <div class="card-footer">
        @can('user_create')
            <a href="{{ route('admin.users.create') }}" class=" btn btn-primary">{{ __('Create a User') }}</a>
        @endcan
        <div class="float-right">
            {{ $users->links() }}
        </div>
    </div>
</div>
