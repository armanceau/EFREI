describe('template spec', () => {
    beforeEach(() => {
        cy.visit('http://localhost/EFREI/M1/tests-unitaires-fonctionnels-e2e/src/tp2/');
    });

    it('Ajoute un utilisateur', () => {
        cy.get('#userForm').click();
        cy.get('#name').type('Manceau');
        cy.get('#email').type('arthur.manceau@exemple.fr');
        cy.get('#add-button').click();
        cy.contains('Manceau').should('be.visible');
        cy.contains('arthur.manceau@exemple.fr').should('be.visible');
    });

    it('Modifie un utilisateur', () => {
        cy.contains('Manceau', { timeout: 5000 }).should('be.visible');
        cy.contains('li', 'Manceau')
            .should('exist')
            .within(() => {
                cy.get('button').first().click();
            });
        cy.get('#name').clear().type('Arthur');
        cy.get('#userForm').submit();
        cy.contains('Arthur').should('be.visible');
        cy.contains('Manceau').should('not.exist');
    });

    it('Supprime un utilisateur', () => {
        cy.contains('Arthur', { timeout: 5000 }).should('be.visible');
        cy.contains('li', 'Arthur')
            .should('exist')
            .within(() => {
                cy.get('button').last().click();
            });
        cy.contains('Arthur').should('not.exist');
    });
})