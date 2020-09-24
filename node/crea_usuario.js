'use strict';

let MongoClient = require('mongodb').MongoClient,
    bcrypt = require('bcrypt-nodejs');

const url = 'mongodb://localhost/agenda';

MongoClient.connect(url, (err, db) => {
    if (err) throw err;
    console.log('BD iniciada correctamente');

    const Usuarios = db.collection('usuarios');

    Usuarios.findOne({nomusu: 'admin'}, (err, doc) => {
        if (err) throw err;

        if (doc) {
            console.log('Usuario registrado anteriormente');
        }
        else {
            let salt = bcrypt.genSaltSync();
            let password_hash = bcrypt.hashSync('clave', salt);
            Usuarios.insertOne({nomusu: 'admin', clave: password_hash}, (err, doc) => {
                if (err) throw err;
                console.log('El usuario se ha registrado correctamente...', JSON.stringify(doc));
            });
        }
        db.close();
    });
});
