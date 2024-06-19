INSERT INTO matricula (
    id, cpf, nome, curso, data_nascimento, nome_contato, telefone_contato, parentesco,
    amigdalite, bronquite, diabetes, sinusite, palpitacao, hemorragia, faltadear,
    convulsao, sarampo, coqueluche, rubeola, catapora, caxumba, tuberculose,
    fisica, auditiva, visual, intelectual, crecimento, desenvolvimento, tratamento,
    medicacao, cirurgia, alergia, observacao
) VALUES
(
    1, '123.456.789-01', 'João Silva', 'Engenharia', '2000-05-15', 'Maria Silva', '1234-5678', 'Mãe',
    TRUE, FALSE, FALSE, TRUE, FALSE, FALSE, TRUE,
    FALSE, FALSE, TRUE, FALSE, FALSE, TRUE, FALSE,
    FALSE, FALSE, TRUE, FALSE, 'Normal', 'Adequado', 'Nenhum',
    'Nenhuma', 'Nenhuma', 'Nenhuma', 'Sem observações'
),
(
    2, '234.567.890-12', 'Ana Souza', 'Medicina', '1998-09-21', 'Carlos Souza', '8765-4321', 'Pai',
    FALSE, TRUE, FALSE, TRUE, FALSE, TRUE, FALSE,
    TRUE, FALSE, FALSE, TRUE, FALSE, FALSE, TRUE,
    FALSE, TRUE, FALSE, TRUE, 'Lento', 'Desenvolvimento atrasado', 'Tratamento contínuo',
    'Medicação diária', 'Cirurgia realizada', 'Alergia a penicilina', 'Monitoramento necessário'
),
(
    3, '345.678.901-23', 'Pedro Oliveira', 'Direito', '1995-12-30', 'Lucia Oliveira', '1122-3344', 'Tia',
    FALSE, FALSE, TRUE, FALSE, TRUE, FALSE, TRUE,
    FALSE, TRUE, FALSE, TRUE, FALSE, TRUE, FALSE,
    TRUE, FALSE, FALSE, TRUE, 'Rápido', 'Desenvolvimento normal', 'Acompanhamento médico',
    'Medicação esporádica', 'Cirurgia de apendicite', 'Alergia a pólen', 'Precisa de cuidados especiais'
);