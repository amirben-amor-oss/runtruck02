SELECT 
    salles.nom AS 'Biggest Room',
    salles.capacite,
    etages.nom AS nom_etage
FROM salles
INNER JOIN etages ON salles.id_etage = etages.id
ORDER BY salles.capacite DESC
LIMIT 1;
