<div class="table-responsive">
    <table class="table">
        <tr>
            <td scope="row">Name</td>
            <td>{{ $data->name }}</td>
        </tr>
        <tr>
            <td scope="row">Username</td>
            <td>{{ $data->username }}</td>
        </tr>
        <tr>
            <td scope="row">Dibuat</td>
            <td>{{ $data->created_at }}</td>
        </tr>
        <tr>
            <td scope="row">Diperbarui</td>
            <td>{{ $data->updated_at }}</td>
        </tr>
    </table>
</div>
