function addCond()
{
  var condSelect = document.getElementById("conditions");
  var condText = condSelect.options[condSelect.selectedIndex].text;
  var condNode = document.createElement("p");
  var condTextNode = document.createTextNode(condText);
  var condButton = document.createElement("button");
  condButton.innerHTML='x';
  condButton.onclick = condBtn;
  condButton.id = 'buttonid';
  
  condNode.appendChild(condTextNode);
  condNode.appendChild(condButton);
  document.getElementById("condP").appendChild(condNode);
}

function condBtn()
{
  var conds = this.parentNode;
  conds.parentNode.removeChild(conds);
}

function addSym()
{
  var symSelect = document.getElementById("symptoms");
  var symText = symSelect.options[symSelect.selectedIndex].text;
  var symNode = document.createElement("p");
  var symTextNode = document.createTextNode(symText);
  var symButton = document.createElement("button");
  symButton.innerHTML='x';
  symButton.onclick = symBtn;
  symButton.id = 'buttonSym';
  
  symNode.appendChild(symTextNode);
  symNode.appendChild(symButton);
  document.getElementById("sym").appendChild(symNode);
}

function symBtn()
{
  var syms = this.parentNode;
  syms.parentNode.removeChild(syms);
}



