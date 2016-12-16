<?php

namespace DebtCollectionBundle\Controller;

use DebtCollectionBundle\Entity\DebtCase;
use DebtCollectionBundle\Entity\DebtCaseDocument;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Debtcasedocument controller.
 *
 * @Route("debtcasedocument")
 */
class DebtCaseDocumentController extends Controller
{
    /**
     * Lists all debtCaseDocument entities.
     *
     * @Route("/", name="debtcasedocument_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $debtCaseDocuments = $em->getRepository('DebtCollectionBundle:DebtCaseDocument')->findAll();

        return $this->render('debtcasedocument/index.html.twig', array(
            'debtCaseDocuments' => $debtCaseDocuments,
        ));
    }

    /**
     * Creates a new debtCaseDocument entity.
     *
     * @Route("/new", name="debtcasedocument_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $debtCaseDocument = new Debtcasedocument();
        $form = $this->createForm('DebtCollectionBundle\Form\DebtCaseDocumentType', $debtCaseDocument);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($debtCaseDocument);
            $em->flush($debtCaseDocument);

            return $this->redirectToRoute('debtcasedocument_show', array('id' => $debtCaseDocument->getId()));
        }

        return $this->render('debtcasedocument/new.html.twig', array(
            'debtCaseDocument' => $debtCaseDocument,
            'form' => $form->createView(),
        ));
    }

    /**
     * @Route("/addocument/{id}", name="debtcasedocument_add_document")
     */
    public function addDocumentToDebtCase(Request $request, DebtCase $debtCase)
    {
        $debtCaseDocument = new Debtcasedocument();
        $debtCaseDocument->setDebtCase($debtCase);
        $form = $this->createForm('DebtCollectionBundle\Form\DebtCaseDocumentType', $debtCaseDocument);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($debtCaseDocument);
            $em->flush($debtCaseDocument);

            return $this->redirectToRoute('debtcase_show', array('id' => $debtCaseDocument->getDebtCase()->getId()));
        }

        return $this->render('debtcasedocument/new.html.twig', array(
            'debtCaseDocument' => $debtCaseDocument,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a debtCaseDocument entity.
     *
     * @Route("/{id}", name="debtcasedocument_show")
     * @Method("GET")
     */
    public function showAction(DebtCaseDocument $debtCaseDocument)
    {
        $deleteForm = $this->createDeleteForm($debtCaseDocument);

        return $this->render('debtcasedocument/show.html.twig', array(
            'debtCaseDocument' => $debtCaseDocument,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing debtCaseDocument entity.
     *
     * @Route("/{id}/edit", name="debtcasedocument_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, DebtCaseDocument $debtCaseDocument)
    {
        $deleteForm = $this->createDeleteForm($debtCaseDocument);
        $editForm = $this->createForm('DebtCollectionBundle\Form\DebtCaseDocumentType', $debtCaseDocument);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('debtcasedocument_edit', array('id' => $debtCaseDocument->getId()));
        }

        return $this->render('debtcasedocument/edit.html.twig', array(
            'debtCaseDocument' => $debtCaseDocument,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a debtCaseDocument entity.
     *
     * @Route("/{id}", name="debtcasedocument_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, DebtCaseDocument $debtCaseDocument)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($debtCaseDocument);
        $em->flush($debtCaseDocument);

        return $this->redirectToRoute('debtcase_show', array('id' => $debtCaseDocument->getDebtCase()->getId()));
    }

    /**
     * Creates a form to delete a debtCaseDocument entity.
     *
     * @param DebtCaseDocument $debtCaseDocument The debtCaseDocument entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(DebtCaseDocument $debtCaseDocument)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('debtcasedocument_delete', array('id' => $debtCaseDocument->getId())))
            ->setMethod('DELETE')
            ->getForm();
    }
}
