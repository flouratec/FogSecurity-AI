# 🔐 FogSecurity-AI  
**Integrated Security Framework for Fog Computing — Node Authentication & Session Continuity**  
*MSc Thesis, Islamic University of Minnesota (IUM), 2026*  
By **Fatimah Lamgharee** | Supervisor: **Dr. Bushra Alshareef**

---

## 🌍 Abstract
Fog computing extends cloud capabilities to the edge of the network, providing low-latency processing for Internet of Things (IoT) systems.  
However, this distributed model introduces severe risks such as rogue nodes and denial-of-service attacks.  
This project proposes an integrated **security and availability model** featuring:

- **Authentication Node Table (ANT):** Hash-based node validation using irreversible SHA-256 encryption.  
- **Mobility Tracker Protocol (MTP):** Seamless session transfer between fog nodes under user mobility.  
- **Routing Table:** JSON-based state storage ensuring uninterrupted service continuity.

---

## ⚙️ Technologies
- **Backend:** PHP 8, MySQL 8  
- **Server:** Apache (via XAMPP)  
- **Language:** JSON for session serialization  
- **Platform:** Microsoft Azure Simulation Environment

---

## 🧪 Experimental Results
| Metric | Cloud | Fog | Improvement |
|--------|--------|------|-------------|
| File retrieval (100MB) | 2.1s | 0.7s | 66% faster |
| Session handoff | 580ms | 150ms | 74% lower latency |
| Unauthorized node detection | 0% | 100% blocked | Secure |

---

## 🧩 Folder Structure
