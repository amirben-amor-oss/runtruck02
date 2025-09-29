USE jour9;

SELECT *
FROM etudiants
WHERE TIMESTAMPDIFF(YEAR, naissance, CURDATE()) < 18;
