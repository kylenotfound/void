@props(['content' => ''])

<div id="editor"></div>
<input type="hidden" name="content" id="content" value="{{ $content ?? old('content') }}" />