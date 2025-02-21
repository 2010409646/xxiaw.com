// JavaScript Document

submitTryit()

function submitTryit() {
    if (window.editor) {window.editor.save();}
    var text = document.getElementById("textareaCode").value;
    var ifr = document.createElement("iframe");
    ifr.setAttribute("frameborder", "0");
    ifr.setAttribute("id", "iframeResult");
    ifr.setAttribute("name", "iframeResult");  
    document.getElementById("iframewrapper").innerHTML = "";
    document.getElementById("iframewrapper").appendChild(ifr);
    var t=text;
    document.getElementById("code").value=t;
    document.getElementById("codeForm").action = "/codes.html";
    document.getElementById('codeForm').method = "get";
    document.getElementById('codeForm').acceptCharset = "utf-8";
    document.getElementById('codeForm').target = "iframeResult";
    document.getElementById("codeForm").submit();
}