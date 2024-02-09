const uploadBox = document.querySelector(".upload-box");
const previewBox = document.querySelector(".preview-box img");
const fileInput = document.getElementById("input");

function roadImg(e) {
  const file = e.target.files[0];
  if (!file) return;  // 何も選択されなければreturn
  previewBox.removeAttribute("hidden");
  previewBox.src = URL.createObjectURL(file);  // fileのurlをsrcに指定
}

// inputのvalueが変更された時の処理
fileInput.addEventListener("change", roadImg, false);
// uploadBoxをクリックすると、inputがクリックされたことになる
uploadBox.addEventListener("click", () => fileInput.click());


// ドラッグアンドドロップの処理
function dragover(e){
  e.stopPropagation();
  e.preventDefault();
  this.style.background = "#e1e7f0";
}

function dragleave(e){
  e.stopPropagation();
  e.preventDefault();
  this.style.background = "#fff";
}

function dropLoad(e) {
  e.stopPropagation();
  e.preventDefault();

  uploadBox.style.background = "#fff";
  let files = e.dataTransfer.files; //ドロップしたファイルを取得
  if (files.length > 1)
    return alert("アップロードできるファイルは1つだけです。");
  fileInput.files = files; // inputのvalueをドロップしたファイルに置き換える
  previewBox.removeAttribute("hidden");
  previewBox.src = URL.createObjectURL(fileInput.files[0]); // fileのurlをsrcに指定
}

// ファイルがドロップされた時の処理
uploadBox.addEventListener("drop", dropLoad, false);
// ドラッグした時の処理
uploadBox.addEventListener("dragover", dragover, false);
// ドラッグがエリアから離れた時の処理
uploadBox.addEventListener("dragleave", dragleave, false);