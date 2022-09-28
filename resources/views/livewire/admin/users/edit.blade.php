<div class="card card-default">
    <form wire:submit.prevent="submit">
        <div class="card-header">
            <h3 class="card-title">{{ __('Edit an User') }}</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">{{ __('Name') }}</label>
                        <input wire:model.defer="user.name" name="name" id="name" type="text" class="form-control @error('user.name') is-invalid @enderror" placeholder="{{ __('Name') }}" required />
                        @error('user.name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <span class="help-block"></span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email" class="form-label required">{{ __('Email') }}</label>
                        <input wire:model.defer="user.email" name="email" id="email" type="email" class="form-control @error('user.email') is-invalid @enderror" placeholder="{{ __('Email') }}" required />
                        @error('user.email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <span class="help-block"></span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="password">{{ __('Password') }}</label>
                        <input wire:model.defer="password" name="password" id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="{{ __('Password') }}" />
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <span class="help-block"></span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="roles">{{ __('Roles') }}</label>
                        <div class="@error('roles') is-invalid @enderror">
                            <x-dual-list-box wire:model="roles" name="roles" id="roles" class="form-control" :options="$this->listsForFields['roles']" multiple required />
                        </div>
                        @error('roles')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <span class="help-block"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
            <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">{{ __('Cancel') }}</a>
        </div>
    </form>
</div>
