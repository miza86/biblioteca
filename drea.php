<script src="SpryAssets/SpryValidationTextarea.js" type="text/javascript"></script>
<link href="SpryAssets/SpryValidationTextarea.css" rel="stylesheet" type="text/css">
<div id="tabelas">
  <table width="200" border="1">
    <tr>
      <td>Alunos</td>
      <td>Currículo</td>
      <td>Semestre;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><form name="form2" method="post" action="">
        <label for="nome aluno"></label>
        <input type="text" name="nome aluno" id="nome aluno">
      </form></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><form name="form3" method="post" action="">
        <p>
          <label>
            <input type="checkbox" name="CheckboxGroup1" value="caixa de seleção" id="CheckboxGroup1_0">
            Caixa de seleção</label>
          <br>
          <label>
            <input type="checkbox" name="CheckboxGroup1" value="caixa de seleção" id="CheckboxGroup1_1">
            Caixa de seleção</label>
          <br>
        </p>
      </form></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><form name="form4" method="post" action="">
        <label for="quesato1"></label>
        <select name="quesato1" id="quesato1">
        </select>
        <span id="sprytextarea1">
        <label for="textarea1"></label>
        <span class="textareaRequiredMsg">Um valor é necessário.</span></span>
        <textarea name="textarea1" id="textarea1" cols="45" rows="5"></textarea>
      </form></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
  <form name="form1" method="post" action="">
    <input type="checkbox" name="semestre" id="semestre">
    Semestre
    <label for="semestre"></label>
  </form>
</div>
<script type="text/javascript">
var sprytextarea1 = new Spry.Widget.ValidationTextarea("sprytextarea1");
</script>
