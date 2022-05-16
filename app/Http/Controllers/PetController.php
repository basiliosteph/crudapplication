<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pet;
use Exception;
use Session;

class PetController extends Controller
{
    public function index()
    {
        //SELECT * FROM Pets
        $pets = Pet::all();
        return view('pets', compact('pets'));
    }

    public function showEditForm($id)
    {
        $pet = Pet::find($id);
        if (!is_null($pet)) {
            return view('edit-pets', compact('pet'));
        }
        Session::flash('error', 'We cannot find the record you are looking for.');
        return redirect()->back();
    }

    public function showNewForm()
    {
        return view('new-pet-form');
    }

    public function savePetsChanges(Request $request)
    {
        $validated = $request->validate([
            'pet_name' => 'required|max:50',
            'animal_type' => 'required|max:100',   
            'pet_owner' => 'required|max:100',
            'address' => 'required|max:150',                               
       ]);
        try {
            $id = $request->id;
            $pet = Pet::find($id);
            $pet->update([
                'pet_name' => $request->pet_name,
                'animal_type' => $request->animal_type,
                'pet_owner' => $request->pet_owner,
                'address' => $request->address
            ]);
            //$pet->setPetName($request->pet_name);
            //$pet->setAnimalType($request->animal_type);
            //$pet->setPetOwner($request->pet_owner);
            //$pet->setAddress($request->address);
    
            Session::flash('message', 'Successfully updated the Pet Record!');
        } catch (Exception $e) {
            Session::flash('error', 'Something went wrong, please try again later.');
        }

        return redirect('/pets');
    }

    public function saveNewPet(Request $request)
    {
        $validated = $request->validate([
            'pet_name' => 'required|max:50',
            'animal_type' => 'required|max:100',   
            'pet_owner' => 'required|max:100',
            'address' => 'required|max:150',                               
       ]);
        try {
            $pet = Pet::create([
                'pet_name' => $request->pet_name,
                'animal_type' => $request->animal_type,
                'pet_owner' => $request->pet_owner,
                'address' => $request->address
            ]);
            if (!is_null($pet)) {
                Session::flash('message', 'Successfully added a new pet!');
            } else {
                throw new Exception ('Unable to create a new pet record.');
            }

        } catch (Exception $e) {
            Session::flash('error', 'Something went wrong, please try again later.');
        }
        return redirect('/pets');
    }

    public function deletePet($id)
    {
        $pet = Pet::find($id);
        $pet->delete();

        Session::flash('message', 'Successfully removed a record!');
        return redirect('/pets');

        // DELETE FROM organizations WHERE id=$id
    }
}
