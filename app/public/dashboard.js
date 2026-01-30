const antTable = document.getElementById("antTable");
const alertsBox = document.getElementById("alerts");
const sessionBox = document.getElementById("sessionBox");

function row(c1,c2,c3,isHeader=false){
  const tr = document.createElement("div");
  tr.className = "tr" + (isHeader ? " th" : "");
  tr.innerHTML = `<div>${c1}</div><div>${c2}</div><div>${c3}</div>`;
  return tr;
}

async function fetchAnt(){
  // Minimal read using SQL: For demo, call a small endpoint inside PHP quickly:
  // We'll fake table if endpoint not added yet.
  antTable.innerHTML = "";
  antTable.appendChild(row("Node MAC","Hash (SHA-256)","Status",true));
  // Demo rows:
  [
    {mac:"00:1A:2B:3C:4D:5E",hash:"d2b99c6a2...f93",status:"Trusted"},
    {mac:"00:3C:4D:5E:6F:7A",hash:"a4e56fd9...442",status:"Trusted"},
  ].forEach(r=>{
    const tag = r.status==="Trusted"
      ? `<span class="tag good">Trusted</span>`
      : `<span class="tag bad">Banned</span>`;
    antTable.appendChild(row(r.mac, r.hash, tag));
  });
}

function seedAlerts(){
  alertsBox.innerHTML = "";
  const items = [
    {t:"Suspicious Activity – Node 7", level:"High Risk"},
    {t:"Failed Login Attempt – Node 12", level:"High Risk"},
    {t:"Abnormal Traffic – Node 19", level:"High Risk"},
  ];
  items.forEach(i=>{
    const el = document.createElement("div");
    el.className="alert";
    el.innerHTML = `<div>${i.t}</div><span class="pill high">${i.level}</span>`;
    alertsBox.appendChild(el);
  });
}

async function postJSON(url, body){
  const res = await fetch(url,{method:"POST",headers:{'Content-Type':'application/json'},body:JSON.stringify(body)});
  return res.json();
}

document.getElementById("btnRegister").onclick = async ()=>{
  const mac = document.getElementById("macInput").value.trim();
  if(!mac) return alert("Enter MAC Address");
  const r = await postJSON("/api/ant_register.php",{mac_address:mac});
  alert("Registered: " + r.hash);
};

document.getElementById("btnRevoke").onclick = async ()=>{
  const mac = document.getElementById("macInput").value.trim();
  if(!mac) return alert("Enter MAC Address");
  const r = await postJSON("/api/ant_revoke.php",{mac_address:mac});
  alert("Revoked: " + r.hash);
};

document.getElementById("btnPush").onclick = async ()=>{
  const session_id = document.getElementById("sessionId").value.trim();
  const current_node = document.getElementById("nodeId").value.trim();
  if(!session_id || !current_node) return alert("Enter session + node");
  const state = {user:"u1", context:"iot-stream", ts: Date.now()};
  const r = await postJSON("/api/mtp_push.php",{session_id,current_node,state});
  sessionBox.textContent = JSON.stringify({pushed:true,...r,state},null,2);
};

document.getElementById("btnPull").onclick = async ()=>{
  const session_id = document.getElementById("sessionId").value.trim();
  if(!session_id) return alert("Enter session_id");
  const res = await fetch(`/api/mtp_pull.php?session_id=${encodeURIComponent(session_id)}`);
  const data = await res.json();
  sessionBox.textContent = JSON.stringify(data,null,2);
};

document.getElementById("btnRefresh").onclick = ()=>{ fetchAnt(); seedAlerts(); };
document.getElementById("btnSimulate").onclick = ()=>{
  alert("Demo: Simulated anomaly triggered. (In full version: send telemetry + update trust score)");
};

fetchAnt(); seedAlerts();
