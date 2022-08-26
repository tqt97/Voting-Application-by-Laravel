@can('update', $idea)
    <livewire:idea.edit-idea :idea="$idea" />
@endcan

@can('delete', $idea)
    <livewire:idea.delete-idea :idea="$idea" />
@endcan

@auth
    <livewire:idea.mark-idea-as-spam :idea="$idea" />
@endauth

@admin
    <livewire:idea.mark-idea-as-not-spam :idea="$idea" />
@endadmin

@auth
    <livewire:comment.edit-comment />
@endauth
