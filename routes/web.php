<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AppController;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SuperadminController;
use App\Models\Utilisateur;


use Illuminate\Support\Facades\Route;
Route::get('/', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'handlogin'])->name('handlogin');
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::middleware('auth')->group(function () {
    Route::get('admin', [AppController::class, 'admin'])->name('admin');
    Route::get('etudiant', [AppController::class, 'etudiant'])->name('etudiant');
    Route::get('superadmin', [AppController::class, 'superadmin'])->name('superadmin');
    Route::get('changepassword', [AppController::class, 'changepassword'])->name('changepassword');
    Route::post('/changer-mot-de-passe', [AppController::class, 'updatePassword'])->name('update.password');
    Route::get('/ajoutetudiant', [AdminController::class, 'ajoutetudiant'])->name('admin.ajoutetudiant');
    Route::post('/store', [AdminController::class, 'store'])->name('admin.store');
    Route::get('/modifsupp', [AdminController::class, 'modifsupp'])->name('admin.modifiersupprimer');
    Route::get('/modifieretudiant/{id}', [AdminController::class, 'modifier'])->name('admin.modifieretudiant');
    Route::post('/update/traitement', [AdminController::class, 'traitement'])->name('update.traitement');
    Route::delete('/supprimeretudiant/{id}', [AdminController::class, 'supprimer'])->name('admin.supprimeretudiant'); // Utilisation de DELETE
    Route::get('/listeetudiant', [AdminController::class, 'listeetudiant'])->name('admin.listeetudiant');
    Route::get('/bloquedebloque', [AdminController::class, 'bloquedebloque'])->name('admin.bloquedebloque');
    Route::get('/bloque/{id}', [AdminController::class, 'bloque'])->name('admin.bloque');
    Route::get('/debloque/{id}', [AdminController::class, 'debloque'])->name('admin.debloque');

    Route::get('/corbeille', [AdminController::class, 'corbeille'])->name('admin.corbeille');
    Route::post('/restore/{id}', [AdminController::class, 'restore'])->name('admin.restore');
    Route::delete('/forceDelete/{id}', [AdminController::class, 'forceDelete'])->name('admin.forceDelete');
    Route::delete('/supprimeretudiants/{id}', [AdminController::class, 'destroy'])->name('admin.destroy');

    Route::prefix('memoire')->group(function(){
        Route::get('/ajoutememoire', [AdminController::class, 'ajoutememoire'])->name('admin.memoire.ajoutmemoire');
        Route::post('/store1', [AdminController::class, 'store1'])->name('admin.memoire.store1');
        Route::get('/modifsuppmemoire', [AdminController::class, 'modifsuppmemoire'])->name('admin.memoire.modifsuppmemoire');
        Route::get('/modifiermemoire/{id}', [AdminController::class, 'modifiermemoire'])->name('admin.memoire.modifiermemoire');
        Route::post('/memoire/traitement1', [AdminController::class, 'traitement1'])->name('admin.memoire.traitement1');
        Route::delete('/supprimermemoire/{id}', [AdminController::class, 'supprimermemoire'])->name('admin.memoire.supprimermemoire'); // Utilisation de DELETE
        Route::get('/listememoire', [AdminController::class, 'listememoire'])->name('admin.memoire.listememoire');
    });

    Route::prefix('etudiant')->middleware('auth')->group(function () {
        Route::get('/listememoire', [EtudiantController::class, 'listememoire'])->name('etudiant.listememoire');
        Route::get('/rechercher', [EtudiantController::class, 'rechercher'])->name('etudiant.rechercher');
        // Route::get('/telecharger/{id}', [EtudiantController::class, 'telecharger'])->name('etudiant.telecharger');
        Route::get('/soumettre', [EtudiantController::class, 'soumettre'])->name('etudiant.soumettre');
        Route::post('/soumettre', [EtudiantController::class, 'traiterSoumission'])->name('etudiant.traiterSoumission');
        Route::post('/evaluer', [EtudiantController::class, 'evaluer'])->name('etudiant.evaluer');
        Route::post('/commentaire', [EtudiantController::class, 'commentaire'])->name('etudiant.commentaire');
    });


    Route::prefix('superadmin')->middleware('auth')->group(function () {
        Route::get('/superadmin/ajoutadmin', [SuperadminController::class, 'ajoutadmin'])->name('superadmin.ajoutadmin');
        Route::post('/store', [SuperadminController::class, 'store'])->name('superadmin.store');
        Route::get('/superadmin/visualiserinfos', [SuperadminController::class, 'visualiserInfos'])->name('superadmin.visualiserinfos');
        Route::get('/superadmin/envoyernotifications', [SuperadminController::class, 'envoyerNotifications'])->name('superadmin.envoyernotifications');
        Route::get('/superadmin/historiquenotifications', [SuperadminController::class, 'historiqueNotifications'])->name('superadmin.historiquenotifications');
        Route::get('/superadmin/actionsutilisateurs', [SuperadminController::class, 'actionsUtilisateurs'])->name('superadmin.actionsutilisateurs');

    });


});

