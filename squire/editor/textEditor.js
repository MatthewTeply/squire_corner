function enableEditMode () {

  richTextField.document.designMode = 'On';
}

function execCmd(command) {

  richTextField.document.execCommand(command, false, '');
}

function execCommandWithArg(command, arg) {

  richTextField.document.execCommand(command, false, arg);
}

var showingSourceCode = false;
var isInEditMode = true;

function toggleSource() {

  if(showingSourceCode) {

    richTextField.document.getElementsByTagName('body')[0].innerHTML = richTextField.document.getElementsByTagName('body')[0].textContent;
    showingSourceCode = false;
  }
  else {

    richTextField.document.getElementsByTagName('body')[0].textContent = richTextField.document.getElementsByTagName('body')[0].innerHTML;
    showingSourceCode = true;
  }
}

function passText() {

  document.getElementsByName('content')[0].value = richTextField.document.getElementsByTagName('body')[0].innerHTML;

  //cont = "waddup";//
}
