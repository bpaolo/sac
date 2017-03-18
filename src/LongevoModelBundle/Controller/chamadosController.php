<?php

namespace LongevoModelBundle\Controller;

use LongevoModelBundle\Entity\chamados;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Chamado controller.
 *
 * @Route("chamados")
 */
class chamadosController extends Controller
{
    /**
     * Lists all chamado entities.
     *
     * @Route("/", name="chamados_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $chamados = $em->getRepository('LongevoModelBundle:chamados')->findAll();

        return $this->render('chamados/index.html.twig', array(
            'chamados' => $chamados,
        ));
    }

    /**
     * Creates a new chamado entity.
     *
     * @Route("/new", name="chamados_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $chamado = new Chamados();
        $form = $this->createForm('LongevoModelBundle\Form\chamadosType', $chamado);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($chamado);
            $em->flush($chamado);

            return $this->redirectToRoute('chamados_show', array('id' => $chamado->getId()));
        }

        return $this->render('chamados/new.html.twig', array(
            'chamado' => $chamado,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a chamado entity.
     *
     * @Route("/{id}", name="chamados_show")
     * @Method("GET")
     */
    public function showAction(chamados $chamado)
    {
        $deleteForm = $this->createDeleteForm($chamado);

        return $this->render('chamados/show.html.twig', array(
            'chamado' => $chamado,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing chamado entity.
     *
     * @Route("/{id}/edit", name="chamados_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, chamados $chamado)
    {
        $deleteForm = $this->createDeleteForm($chamado);
        $editForm = $this->createForm('LongevoModelBundle\Form\chamadosType', $chamado);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('chamados_edit', array('id' => $chamado->getId()));
        }

        return $this->render('chamados/edit.html.twig', array(
            'chamado' => $chamado,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a chamado entity.
     *
     * @Route("/{id}", name="chamados_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, chamados $chamado)
    {
        $form = $this->createDeleteForm($chamado);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($chamado);
            $em->flush();
        }

        return $this->redirectToRoute('chamados_index');
    }

    /**
     * Creates a form to delete a chamado entity.
     *
     * @param chamados $chamado The chamado entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(chamados $chamado)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('chamados_delete', array('id' => $chamado->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
