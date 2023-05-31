<input type="{{ $type ?? ''}}" {{ $required ?? ''}} {{ $readonly ?? ''}} name="{{ $name ?? ''}}" value="{{old($name ?? '') ?? $value ?? '' }}" id="{{$name ?? ''}}" class="form-control @error($name ?? '') is-invalid @enderror" placeholder="{{$placeholder ?? ''}}">
@error($name ?? '')
<small class="text-danger">{{ $message }}</small>
@enderror
