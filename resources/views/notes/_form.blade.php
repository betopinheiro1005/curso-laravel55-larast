		<div class="form-group">
			<label for="">Título</label>
			{{-- <input name="title" value="{{ old('title', isset($note) ? $note->title : '') }}" type="text" class="form-control" id="" placeholder="Digite o título"> --}}
			{!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Digite o título']) !!}
		</div>

		<div class="form-group">
			<label for="">Anotação</label>
			{{-- <textarea name="body" type="text" class="form-control" id="" placeholder="Digite a anotação">{{ old('body', isset($note) ? $note->body : '') }}</textarea> --}}
			{!! Form::textarea('body', null, ['class' => 'form-control', 'placeholder' => 'Digite a anotação', 'rows' => 6]) !!}
		</div>

		<div class="form-group">
			<label>Grupo</label>
			{{-- <select class="form-control" name="group_id">
				<option value="">--Nenhum--</option>
				@foreach($groups as $group)
					<option value="{{ $group->id}}"
						@if(!is_null(old('group_id')))
							{{ old('group_id') == $group->id ? 'selected' : '' }}
						@else
							@if(isset($note))
								{{ $note->group_id == $group->id ? "selected" : ''}}
							@endif
						@endif
						>{{ $group->name }}</option>
				@endforeach
			</select> --}}
			{!! Form::select('group_id', $groups, null, ['class' => 'form-control', 'placeholder' => '--Nenhum--']) !!}
		</div>

		<div class="checkbox">
			<label>
				<input type="hidden" name="important" value="0">
				{!! Form::checkbox('important', 1) !!}
 				 É importante
				}
			</label>
		</div>
