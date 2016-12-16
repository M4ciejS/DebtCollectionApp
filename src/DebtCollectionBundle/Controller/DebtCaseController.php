<?php

namespace DebtCollectionBundle\Controller;

use DebtCollectionBundle\Entity\Client;
use DebtCollectionBundle\Entity\DebtCase;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Form\Button;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;

/**
 * Debtcase controller.
 *
 * @Route("debtcase")
 */
class DebtCaseController extends Controller
{
    /**
     * Lists all debtCase entities.
     *
     * @Route("/", name="debtcase_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $debtCases = $em->getRepository('DebtCollectionBundle:DebtCase')->findAll();

        return $this->render('debtcase/index.html.twig', array(
            'debtCases' => $debtCases,
        ));
    }

    /**
     * Creates a new debtCase entity.
     *
     * @Route("/new", name="debtcase_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $debtCase = new Debtcase();
        $form = $this->createForm('DebtCollectionBundle\Form\DebtCaseType', $debtCase);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($debtCase);
            $em->flush($debtCase);

            return $this->redirectToRoute('debtcase_show', array('id' => $debtCase->getId()));
        }

        return $this->render('debtcase/new.html.twig', array(
            'debtCase' => $debtCase,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a debtCase entity.
     *
     * @Route("/{id}", name="debtcase_show")
     * @Method("GET")
     */
    public function showAction(DebtCase $debtCase)
    {
        return $this->render('debtcase/show.html.twig', array(
            'debtCase' => $debtCase,
        ));
    }

    /**
     * Displays a form to edit an existing debtCase entity.
     *
     * @Route("/{id}/edit", name="debtcase_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, DebtCase $debtCase)
    {
        $deleteForm = $this->createDeleteForm($debtCase);
        $editForm = $this->createForm('DebtCollectionBundle\Form\DebtCaseType', $debtCase);
        $editForm->handleRequest($request);
        if ($editForm->isSubmitted() && $editForm->isValid()) {

                $this->getDoctrine()->getManager()->flush();

                return $this->redirectToRoute('debtcase_edit', array('id' => $debtCase->getId()));

        }
        $debbCaseDocumentDeleteForms=[];
        if($debtCase->hasDocuments()){
            foreach($debtCase->getDocuments() as $v){
                $debbCaseDocumentDeleteForms[$v->getId()]=$this->createFormBuilder()
                    ->setAction($this->generateUrl('debtcasedocument_delete', array('id' => $v->getId())))
                    ->setMethod('DELETE')
                    ->add('Delete', SubmitType::class, array(
                        'attr' => array('class' => 'btn btn-danger')))
                    ->getForm()->createView()
                    ;

            }
        }
        return $this->render('debtcase/edit.html.twig', array(
            'debtCase' => $debtCase,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
            'document_delete_forms' => $debbCaseDocumentDeleteForms,
        ));
    }

    /**
     * Deletes a debtCase entity.
     *
     * @Route("/{id}", name="debtcase_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, DebtCase $debtCase)
    {
        $form = $this->createDeleteForm($debtCase);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($debtCase);
            $em->flush($debtCase);
        }

        return $this->redirectToRoute('debtcase_index');
    }

    /**
     * Creates a form to delete a debtCase entity.
     *
     * @param DebtCase $debtCase The debtCase entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(DebtCase $debtCase)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('debtcase_delete', array('id' => $debtCase->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
