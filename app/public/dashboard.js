const antTable = document.getElementById("antTable");
const alertsBox = document.getElementById("alerts");
const sessionBox = document.getElementById("sessionBox");

function row(c1,c2,c3,isHeader=false){
  const tr = document.createElement("div");
  tr.className = "tr" + (isHeader ? " th" : "");
  tr.innerHTML = `<div>${c1}</div><div>${c2}</div><div>${c3}</div>`;
  return tr;
}

//
// 🔐 جلب بيانات العقد الحقيقية من ANT
//
async function fetchAnt(){
  antTable.innerHTML = "";
  antTable.appendChild(row("Node MAC","Hash (SHA-256)","Status",true));

  try {
    const res = await fetch("/api/ant_list.php");
    const data = await res.json();

    if(!data.ok || data.nodes.length === 0){
      antTable.appendChild(row("No nodes yet","—","—"));
      return;
    }

    data.nodes.forEach(r=>{
      const tag = r.status==="Trusted"
        ? `<span class="tag good">Trusted</span>`
        : `<span class="tag bad">Banned</span>`;
      antTable.appendChild(row(r.node_mac, r.mac_hash.substring(0,12)+"...", tag));
    });

  } catch(err){
    antTable.appendChild(row("Error loading data","Check API","—"));
  }
}

//
// 🔄 جلب الجلسات من جدول MTP
//
async function fetchSessions(){
  try {
    const res = await fetch("/api/session_list.php");
    const data = await res.json();
