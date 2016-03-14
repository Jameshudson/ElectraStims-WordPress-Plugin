<?php
/**
 * Created by IntelliJ IDEA.
 * User: Cyrex
 * Date: 12/02/2016
 * Time: 15:34
 */

namespace shortcodes\rma\form;

use ValidFormBuilder\ValidForm;


class RMAForm{

    private $form;

    public function __construct(){

        $this->form = new ValidForm("RMA", "", esc_url("http://" . $_SERVER["HTTP_HOST"] . explode('?', $_SERVER['REQUEST_URI'])[0]), array());

        $this->form->addHiddenField(
            "wp_nonce",
            ValidForm::VFORM_STRING,
            array("required" => true),
            array());

        $this->form->addField(
            "first_name",
            "First name",
            ValidForm::VFORM_STRING,
            array("required" => true),
            array("required" => "This field is required"));

        $this->form->addField(
            "last_name",
            "Last name",
            ValidForm::VFORM_STRING,
            array("required" => true),
            array("required" => "This field is required"));

        $this->form->addField(
            "email",
            "Email",
            ValidForm::VFORM_EMAIL,
            array("required" => true),
            array("required" => "This field is required"));

        $this->form->addField(
            "phone",
            "Phone",
            ValidForm::VFORM_STRING,
            array("required" => true),
            array("required" => "This field is required"));

        $this->form->addField(
            "addressLine",
            "Address Line",
            ValidForm::VFORM_STRING,
            array("required" => true),
            array("required" => "This field is required"));

        $this->form->addField(
            "addressLine2",
            "Address Line 2",
            ValidForm::VFORM_STRING,
            array("required" => true),
            array("required" => "This field is required"));

        $this->form->addField(
            "town",
            "Town",
            ValidForm::VFORM_STRING,
            array("required" => true),
            array("required" => "This field is required"));

        $this->form->addField(
            "county",
            "County",
            ValidForm::VFORM_STRING,
            array("required" => true),
            array("required" => "This field is required"));

        $this->form->addField(
            "postcode",
            "Postcode",
            ValidForm::VFORM_STRING,
            array("required" => true),
            array("required" => "This field is required"));

        $this->form->addField(
            "date_purchase",
            "Date of purchase",
            ValidForm::VFORM_DATE,
            array("required" => true),
            array("required" => "This field is required"));

        $this->form->addField(
            "product-return",
            "Product",
            ValidForm::VFORM_STRING,
            array("required" => true),
            array("required" => "This field is required"));

        $this->form->addField(
            "serial",
            "Serial number",
            ValidForm::VFORM_STRING,
            array("required" => true),
            array("required" => "This field is required"));

        $this->form->addField(
            "reason",
            "Reason for return",
            ValidForm::VFORM_TEXT,
            array("required" => true),
            array("required" => "This field is required"));

        $this->form->addField(
            "additional",
            "Additional information",
            ValidForm::VFORM_TEXT,
            array("required" => true),
            array("required" => "This field is required"));

        //setting default values.
        $this->form->setDefaults(["wp_nonce" => wp_create_nonce()]);
    }

    public function getForm(){

        echo $this->form->toHtml();
    }

    public function valid(){

        if($this->form->isSubmitted() && $this->form->isValid()){

            if(wp_verify_nonce($this->form->getValidField("wp_nonce")->getValid())){

                return true;
            }
        }

        return false;
    }

    public function complete(){

        $rmaPost = new modules\rma\util\RMAPost();

        $rma->setFirstName($this->form->getValidField("first_name"));
        $rma->setLastName($this->form->getValidField("last_name"));

        $rma->setEmail($this->form->getValidField("email"));
        $rma->setPhoneNumber($this->form->getValidField("phone"));

        $rma->setAddressLine($this->form->getValidField("addressLine"));
        $rma->setAddressLine2($this->form->getValidField("addressLine2"));

        $rma->setTown($this->form->getValidField("town"));
        $rma->setCounty($this->form->getValidField("county"));
        $rma->setPostcode($this->form->getValidField("postcode"));

        $rma->setDatePurchase($this->form->getValidField("date_purchase"));

        $rma->setProduct($this->form->getValidField("product-return"));
        $rma->setProductSerial($this->form->getValidField("serial"));

        $rma->setReasonForReturn($this->form->getValidField("reason"));
        $rma->setAdditional($this->form->getValidField("additional"));

        $rma->commit();

        return $rma->getID();
    }
}