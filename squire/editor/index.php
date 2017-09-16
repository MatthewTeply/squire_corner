<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
      <title>Rich text editor</title>
    <link rel="stylesheet" href="editor.css">
  </head>
  <body onload="enableEditMode()">

    <div class="wrapper">
      <div class="edit-window">
        <div class="toolbar">
          <button type="button" name="" onclick="execCmd('bold')"><b>B</b></button>
          <button type="button" name="" onclick="execCmd('italic')"><i>I</i></button>
          <button type="button" name="" onclick="execCmd('underline')"><u>u</u></button>
          <button type="button" name="" onclick="execCmd('strikeThrough')"><strike>Strike</strike></button>
          <select class="" name="" onclick="execCommandWithArg('formatBlock', this.value)">
            <option value="h1"><h1>h1</h1></option>
            <option value="h2"><h2>h2</h2></option>
            <option value="h3"><h3>h3</h3></option>
            <option value="h4"><h4>h4</h4></option>
          </select>
          <select type="text" onchange="execCommandWithArg('fontSize', this.value)">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
          </select>
          <label for="foreColor">Fore</label><input name="foreColor" class='colorPick' type="color" onchange="execCommandWithArg('foreColor', this.value)">
          <label for="hiliteColor">Hilite</label><input name="hiliteColor" class='colorPick' type="color" onchange="execCommandWithArg('hiliteColor', this.value)">
          <select class="" name="" onchange="execCommandWithArg('fontName', this.value)">
            <option value="Arial">Arial</option>
            <option value="Comic Sans MS">Comic Sans MS</option>
            <option value="Courier">Courier</option>
            <option value="Georgia">Georgia</option>
            <option value="Tahoma">Tahoma</option>
            <option value="Times New Roman">Times New Roman</option>
            <option value="Verdana">Verdana</option>
          </select>
          <button type="button" name="" onclick="execCmd('justifyLeft')" title="Left"><<</button>
          <button type="button" name="" onclick="execCmd('justifyCenter')">Center</button>
          <button type="button" name="" onclick="execCmd('justifyRight')" title="Right">>></button>
          <button type="button" name="" onclick="execCmd('undo')">Undo</button>
          <button type="button" name="" onclick="execCmd('redo')">Redo</button>
          <button type="button" name="" onclick="toggleSource()">Source</button>
        </div>
        <iframe id='editor' name="richTextField" width="1000px" height="600px" onkeyup='passText()' onchange='passText()' >

        </iframe>
        <script type="text/javascript" src="textEditor.js"></script>
      </div>
    </div>


  </body>
</html>
