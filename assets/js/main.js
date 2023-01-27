function listExames() {
    const exameSelect = document.getElementById("exameSelected");
    const exameList = ["acetil colinesterase eritrocitária", "acetona sangue", "acetona urina", "ácido fenil-glioxilico", "ácido hipúrico", "ácido mandelico", "acido metil hipurico", "ácido tricloreto acético", "ácido t-transmuconico", "ácido úrico", "acuidade visual", "alau", "amilase", "anfetaminas", "anti hbs - igg", "anti hbs - igm", "anti hcv", "anti hiv", "antibiograma", "audiometria", "avaliação odontológica", "avaliação oftalmológica", "avaliação psicologica", "avaliação psicossocial", "avaliação toxicológica", "beta hcg", "bilirrumina total + frações", "brucelose", "cádmio (sangue)", "cádmio (urina)", "cálcio ", "canabinóides", "carboxihemoglobina", "ceruloplasmina", "chagas igg", "chagas igm", "chumbo - sérico (sangue)", "coagulograma ", "cobre (sangue)", "cocaína", "colesterol hdl/ldl/vldl", "colesterol total", "colinesterase plasmática", "colpocitoliga oncótica", "consulta clínica", "contagem de plaquetas", "controle de absenteísmo", "coprocultura", "covid anticorpos totais", "covid pcr", "covid teste rápido", "creatinina", "cromatopsia", "cromo", "cultura e antibiograma", "curva glicêmica", "dinamometria", "dosagem de cromo u", "dosagem de fluoreto", "dosagem de manganês u", "eas", "ecg", "eeg", "epf", "eritograma", "espirometria", "exame clinico", "exame clínico", "fator rh", "fenol", "ferratina", "ferro sérico", "fluoreto sangue", "fluoreto urina", "fosfatase alcalina", "fósforo", "gama gt", "glicemia jejum", "glicose", "grupo sanguineo e fator rh", "hbsag", "hemoglobina glicosada", "hemograma completo", "hepatite A", "hepatite B", "hepatite C", "hexanodiona urina", "hidroxi - vitamina d", "hiv", "ige total", "lipidograma", "machado guerreiro", "magnésio", "mamografia",
    "manganês", "mercúrio (sangue)", "mercúrio (urina)", "metahemoglobina", "metahemoglobina", "metanol", "metil etil cetona - mek", "micológico", "parasitológico de fezes", "pcr - proteína", "potássio", "psa livre", "psa total", "pth", "raio x  coluna lombo sacra - pa e perfil", "raio x cervical", "raio x coluna lombo sacra", "raio x de tórax - pa", "raio x de tórax oit", "raio x de tórax pa e perfil", "raio x dorsal", "reticulócitos", "romberg", "rotina de urina eas", "sódio", "t3 - triiodotironina", "t4 - tiroxina total", "teste de protombina", "tgo", "tgp", "tipagem sanguínea", "triagem (drogas)", "triagem vocal", "tricolorocompostos totais", "triglicerídeos", "tsh", "ureia", "urina tipo I", "urocultura", "vdrl", "vitamina b12", "vitamina d ", "zinco", "LGE específico abelha", "LGE específico vespa"];
    
    exameList.forEach((exame) => {
    option = new Option(exame, exame.toUpperCase());
    exameSelect.options[exameSelect.options.length] = option;
    });            
    
    console.log(exameSelect)
}

  
function aptAltura() {
  if (document.getElementById("aptidaoAltura").checked) {
    document.getElementById("aptidaoEspecificaAltura").value = "[  ] apto para trabalho em altura   [  ] inapto para trabalho em altura";
  } else {
    document.getElementById("aptidaoEspecificaAltura").value = "";
  }
  console.log('aptidao para altura');
}

function aptConfinado() {
    if (document.getElementById("aptidaoConfinado").checked) {
      document.getElementById("aptidaoEspecificaConfinado").value = "[  ] apto para trabalho em espaço confinado   [  ] inapto para trabalho em espaço confinado";
    } else {
      document.getElementById("aptidaoEspecificaConfinado").value = "";
    }
    console.log('aptidao para confinado');
}

function aptAlimentos() {
    if (document.getElementById("aptidaoAlimentos").checked) {
      document.getElementById("aptidaoEspecificaAlimentos").value = "[  ] apto para trabalho com manipulação de alimentos   [  ] inapto para trabalho com manipulação de alimentos";
    } else {
      document.getElementById("aptidaoEspecificaAlimentos").value = "";
    }
    console.log('aptidao manipular alimentos');
}