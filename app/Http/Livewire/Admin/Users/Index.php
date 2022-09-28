<?php

namespace App\Http\Livewire\Admin\Users;

use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public string $search = '';

    protected $queryString = [
        'search' => [
            'except' => ''
        ],
        'page' => [
            'except' => 1
        ],
    ];

    protected $listeners = ['deleteItem'];

    public function render()
    {
        $users = User::with('roles')
            ->when($this->search, function ($query, $search) {
                return $query->where('name', 'like', '%'.$search.'%');
            })
            ->paginate(10);

        return view('livewire.admin.users.index', compact('users'));
    }

    public function deleteConfirm($id)
    {
        abort_if(Gate::denies("user_delete"), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $this->dispatchBrowserEvent('swal:confirm', [
            'type' => 'warning',
            'title' => 'Are you sure?',
            'text' => '',
            'id' => $id,
        ]);
    }

    public function deleteItem($id)
    {
        abort_if(Gate::denies("user_delete"), Response::HTTP_FORBIDDEN, '403 Forbidden');

        User::where('id', $id)->delete();

        $this->dispatchBrowserEvent('toastr:info', [
            'message' => 'Record was deleted.',
        ]);
    }
}
