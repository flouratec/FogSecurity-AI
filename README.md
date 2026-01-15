![FogSecurity-AI Banner](banner.png)

# 🔐 FogSecurity-AI  
**Integrated Security Framework for Fog Computing — Node Authentication & Session Continuity**  
*MSc Thesis, Islamic University of Minnesota (IUM), 2026*  
By **Eng. Fatimah Lamgharee** | Supervisor: **Dr. Mohammed Ali**

---

## 🌍 Abstract
Fog computing extends cloud capabilities to the network edge, reducing latency for Internet of Things (IoT) environments.  
However, this distributed model introduces critical risks such as rogue nodes and denial-of-service attacks.  
This project presents an integrated **security and availability model** featuring:

- **Authentication Node Table (ANT):** Hash-based node validation (SHA-256).  
- **Mobility Tracker Protocol (MTP):** Seamless session transfer between fog nodes.  
- **Routing Table:** JSON-based state storage for continuous service.

---

## ⚙️ Technologies
- **Backend:** PHP 8, MySQL 8  
- **Server:** Apache (XAMPP)  
- **Language:** JSON for session serialization  
- **Platform:** Microsoft Azure Simulation Environment

---

## 🧪 Experimental Results
| Metric | Cloud | Fog | Improvement |
|:--------|:------|:----|:-------------|
| File retrieval (100 MB) | 2.1 s | 0.7 s | 66 % faster |
| Session handoff | 580 ms | 150 ms | 74 % lower latency |
| Unauthorized node detection | 0 % | 100 % blocked | Secure |

---

## 🧩 Folder Structure
