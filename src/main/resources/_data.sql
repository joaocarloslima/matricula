INSERT INTO matricula (
    id, cpf, nome, curso, data_nascimento, nome_contato, telefone_contato, parentesco,
    amigdalite, bronquite, diabetes, sinusite, palpitacao, hemorragia, faltadear,
    convulsao, sarampo, coqueluche, rubeola, catapora, caxumba, tuberculose,
    fisica, auditiva, visual, intelectual, crecimento, desenvolvimento, tratamento,
    medicacao, cirurgia, alergia, observacao, autorizacao_imagem
) VALUES
(
    1, '89535925008', 'João Silva', 'Engenharia', '2000-05-15', 'Maria Silva', '1234-5678', 'Mãe',
    TRUE, TRUE, TRUE, TRUE, TRUE, TRUE, TRUE,
    TRUE, TRUE, TRUE, TRUE, TRUE, TRUE, TRUE,
    TRUE, TRUE, TRUE, TRUE, 'Normal', 'Adequado', 'Nenhum',
    'Nenhuma', 'Nenhuma', 'Nenhuma', 'Sem observações', FALSE
),
(
    2, '41351454005', 'Ana Souza', 'Medicina', '1998-09-21', 'Carlos Souza', '8765-4321', 'Pai',
    FALSE, TRUE, FALSE, TRUE, FALSE, TRUE, FALSE,
    TRUE, FALSE, FALSE, TRUE, FALSE, FALSE, TRUE,
    FALSE, TRUE, FALSE, TRUE, 'Lento', 'Desenvolvimento atrasado', 'Tratamento contínuo',
    'Medicação diária', 'Cirurgia realizada', 'Alergia a penicilina', 'Monitoramento necessário', TRUE
),
(
    3, '59500170051', 'Pedro Oliveira', 'Direito', '1995-12-30', 'Lucia Oliveira', '1122-3344', 'Tia',
    FALSE, FALSE, TRUE, FALSE, TRUE, FALSE, TRUE,
    FALSE, TRUE, FALSE, TRUE, FALSE, TRUE, FALSE,
    TRUE, FALSE, FALSE, TRUE, 'Rápido', 'Desenvolvimento normal', 'Acompanhamento médico',
    'Medicação esporádica', 'Cirurgia de apendicite', 'Alergia a pólen', 'Precisa de cuidados especiais', FALSE
);