# FogSecurity-AI
**Integrated Security Model for Fog Computing**

## 🔐 Description
This project implements a hybrid security model combining:
- **Authentication Node Table (ANT):** prevents rogue node attacks using SHA-256 hashing.
- **Mobility Tracker Protocol (MTP):** maintains session continuity during node handoff.
- **Routing Table:** stores session states as JSON objects for rapid recovery.

## ⚙️ Technologies
- PHP 8
- MySQL 8
- Apache (XAMPP)
- JSON for session serialization

## 🧪 How to Run
1. Install **XAMPP** and start *Apache* and *MySQL*.
2. Import `routing_table.sql` in phpMyAdmin.
3. Place all files in the `htdocs/FogSecurity-AI/` folder.
4. Visit [http://localhost/FogSecurity-AI/ANT.php](http://localhost/FogSecurity-AI/ANT.php) to register a node.
5. Test the handoff simulation in `mobility_tracker.php`.

## 📊 Simulation Dataset
Contains latency and reliability tests comparing cloud vs fog processing:
| Metric | Cloud | Fog | Improvement |
|---------|--------|------|-------------|
| Retrieval (100MB) | 2.1s | 0.7s | 66% |
| Handoff latency | 580ms | 150ms | 74% |

## 📁 Author
Fatimah Lamgharee — *MSc in Data Science & AI, Islamic University of Minnesota*

## 🔗 Publication
This repository supports the master’s thesis:  
“Security Issues in Fog Computing: An Integrated Model for Node Authentication and Service Availability” (2026)
