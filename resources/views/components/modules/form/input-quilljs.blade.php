@props(['name', 'value'])
<div id="editor-quilljs" style="height: 300px !important;" {{ $attributes }}>{{ $value }}</div>
<textarea rows="3" class="hidden" name="{{ $name }}" id="quill-editor-area">{{ $value }}</textarea>
